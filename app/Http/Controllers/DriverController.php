<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\DriverLocations;
use App\Models\Routes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use PDF;

class DriverController extends Controller
{
    use PasswordValidationRules;

    /*public function __construct(Request $request)
    {
        $value = $request->session()->get('key');

        // ...

        $user = $this->users->find($id);

        return view('user.profile', ['user' => $user]);
    }*/

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
        $data['allData'] = User::where('role', 2)->get();
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

    public function updateDriverStatus(Request $request)
    {
        $id = $request->input('id');
        $driverStatus = $request->input('driverStatus');
        $data = User::find($id);
        $data->status = $driverStatus;
        $data->save();
        Log::info($request);

        $data['allData'] = User::where('role', 2)->get();
        return view('driver.driverlist', $data);
    }

    public function CreateDriver(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);


        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $driver = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => 2,
            'phone' => $input['phone'],
            'vehicle_number' => $input['vehicle_number'],
            'route_number' => $input['route_number'],
            'password' => Hash::make($input['password'])
        ]);

        if ($driver->exists) {
            $data['allData'] = User::all();

            return view('driver.driverlist', $data);
        } elseif ($driver->exists != 1) {
            return view('driver.register');
        }
    }
}
