<?php

namespace App\Http\Controllers;

use App\Models\DriverLocations;
use App\Models\Routes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PDF;

class DriverController extends Controller
{

    public function DriverLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();

        $routes = Routes::select('route_id','route_number', 'route_name', 'route_description', 'status', 'created_at')
            ->with(['route_start_point' => function($query){
                $query->select('route_id','route_start_name', 'route_start_lat', 'route_start_lon');
            }, 'route_end_point' => function($query){
                $query->select('route_id','route_end_name', 'route_end_lat', 'route_end_lon');
            }])->where('route_id', $user->route_number)->get();

        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
        return response()->json(['success'=>true,'message'=>'success', 'data' => $routes]);
    }

    public function RegisterDriver()
    {
        return view('driver.register');
    }

    public function DriverList()
    {
        $data['allData'] = User::where('role', 1)->get();
        return view('driver.driverlist', $data);
    }

    public function GetDriverList()
    {
        $data['allData'] = User::all();
        return view('driver.driverlist', $data);
    }

    public function DriverRoutesList()
    {
        $data['allData'] = DriverLocations::with(['routes', 'driver'])
        //->where('role', 1)
        ->get();

        return view('reports.driver_routes', $data);
    }

    public function AllDriverList()
    {
        $data['allData'] = User::with(['route'])->where('role', 1)->get();

        return view('reports.all_driver_list', $data);
    }

    public function generatePDF()
    {
        $data['allData'] = DriverLocations::with(['routes', 'driver'])
                //->where('role', 1)
                ->get();

        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('driver_routes_report.pdf');
    }

    public function generatePDFAllDriver()
    {
        $data['allData'] = User::with(['route'])->where('role', 1)->get();
        $pdf = PDF::loadView('all_driver_report', $data);
        return $pdf->download('all_driver_report.pdf');
    }

    public function AllRoutesList()
        {
            $data['allData'] = DriverLocations::with(['routes', 'driver'])
            //->where('role', 1)
            ->get();

            return view('reports.driver_routes', $data);
        }
}
