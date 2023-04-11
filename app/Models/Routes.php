<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;

    public function route_start_point(){
        return $this->hasOne(RouteStartPoint::class, 'route_id', 'route_id');
    }

    public function route_end_point(){
        return $this->hasOne(RouteEndPoint::class, 'route_id', 'route_id');
    }
}
