<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

//    public function hasAnyRole($roles)
//    {
//        if(is_array($roles)){
//            foreach ($roles as $role){
//                if( $this->hasRole($role)){
//                    return true;
//                }
//            }
//        }else{
//            if( $this->hasRole($roles)){
//                return true;
//            }
//        }
//        return false;
//    }
//
//    public function hasRole($role)
//    {
//        if($this->roles()->where('name' , $role)->first()){
//            return true;
//        }
//        return false;
//    }

    public function hasRoles($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }
    
    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }

}
