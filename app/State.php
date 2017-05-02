<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function services()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function serviceName()
    {
        return $this->services()->first()->name;
    }

    public static function haveState($name,$service_id){
        return State::where(['name' => $name , 'service_id' => $service_id])->get()->count();
    }

    /*
     * $action: type of acction we use (create = 1 , delete = 2)
     */
    public static function updatePosision($actioin , $position,$service_id){
        if($actioin == 1){
            $operator = ">=";
        }elseif ($actioin == 2){
            $operator = ">";
        }else{
            return response("این عملیات قابل انجام نیست" , 401);
        }

        $statesAffter = State::where([
            ['position',$operator ,$position],
            ['service_id',$service_id]
        ])->get();

        foreach ($statesAffter as $stateAffter){
            if($actioin == 1){
                $stateAffter->position = $stateAffter->position + 1;
            }elseif ($actioin == 2){
                $stateAffter->position = $stateAffter->position - 1;
            }
            $stateAffter->position;
            $stateAffter->update();
        }
        return true;
    }
}
