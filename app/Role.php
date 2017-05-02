<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static function haveRole($role){
        if (is_string($role)) {
            return Role::get()->contains('name', $role);
        }

        return !!$role->intersect(Role::get())->count();
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function hasPermissions($permission)
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return !!$permission->intersect($this->permissions)->count();
    }
}
