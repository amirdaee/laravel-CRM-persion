<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function states()
    {
        return $this->hasMany(State::class,'service_id','id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'service_id','id');
    }

    public static function haveService($service){
        if (is_string($service)) {
            return Service::get()->contains('name', $service);
        }

        return !!$service->intersect(Service::get())->count();
    }
}
