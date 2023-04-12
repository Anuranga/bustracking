<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Routes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class PassengerController extends Controller
{
    use PasswordValidationRules;

    public function create(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $routes = Routes::select('route_id','route_number', 'route_name', 'route_description', 'status', 'created_at')
            ->with(['route_start_point' => function($query){
                $query->select('route_id','route_start_name', 'route_start_lat', 'route_start_lon');
            }, 'route_end_point' => function($query){
                $query->select('route_id','route_end_name', 'route_end_lat', 'route_end_lon');
            }])->get();

        try{
           User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'role' => 2,
                'phone' => $input['phone'],
                'vehicle_number' => 'PASSENGER',
                'route_number' => 0,
                'password' => Hash::make($input['password'])
            ]);
            return [
                'routs' => $routes,
                "code" => 200,
                "message" => "Success"
            ];
        } catch (\Exception $ex){
            return [
                'routs' => $ex,
                "code" => 500,
                "message" => "Fail"
            ];
        }

    }

    public function PassengerLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)
            ->where('role', '=', 2)->first();

        $routes = Routes::select('route_id','route_number', 'route_name', 'route_description', 'status', 'created_at')
            ->with(['route_start_point' => function($query){
                $query->select('route_id','route_start_name', 'route_start_lat', 'route_start_lon');
            }, 'route_end_point' => function($query){
                $query->select('route_id','route_end_name', 'route_end_lat', 'route_end_lon');
            }])->get();

        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
        return response()->json(['success'=>true,'message'=>'success', 'data' => $routes]);
    }
}
