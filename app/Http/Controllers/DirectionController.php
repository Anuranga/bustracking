<?php

namespace App\Http\Controllers;
use App\Models\DriverLocations;
use App\Models\Routes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DirectionController extends Controller
{
    public function UserLocationRequest($origin, $destination)
    {
        $endpoint = "https://maps.googleapis.com/maps/api/directions/json";
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $endpoint, ['query' => [
            'origin' => $origin,
            'destination' => $destination,
            'key' => 'AIzaSyDZvFKd1dUll-O0dvJ8Xud1Ou6NVEvPoVY',
            'travelMode' => 'TRANSIT',
            'provideRouteAlternatives' => 'true',
            'waypoints' => []

        ]]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return json_decode($response->getBody(), true);
    }

    public function GetRoutes(): array
    {
        $routes = Routes::select('route_id','route_number', 'route_name', 'route_description', 'status', 'created_at')
            ->with(['route_start_point' => function($query){
                $query->select('route_id','route_start_name', 'route_start_lat', 'route_start_lon');
            }, 'route_end_point' => function($query){
                $query->select('route_id','route_end_name', 'route_end_lat', 'route_end_lon');
            }])->get();

        return [
            'routs' => $routes,
            "code" => 200,
	        "message" => "Success"
        ];
    }

    public function GetRoutesVehicleList($id): array
    {
        $routes = DriverLocations::select('route_id','vehicle_number', 'lat', 'lon')
            ->where('route_id', $id)
            ->where('trip_status', 1)
            ->get();

        return [
            'routs' => $routes,
            "code" => 200,
	        "message" => "Success"
        ];
    }

    public function storeDriverLocation(Request $request)
    {
        return DriverLocations::create([
            'route_id' => $request['route_id'],
            'vehicle_number' => $request['vehicle_number'],
            'lat' => $request['lat'],
            'lon' => $request['lon'],
            'origin' => '',
            'trip_status' => $request['trip_status'],
            'destination' => ''
        ]);
    }
}
