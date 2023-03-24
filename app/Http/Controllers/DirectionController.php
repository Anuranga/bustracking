<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function UserLocationRequest($origin, $destination){

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
}
