<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
