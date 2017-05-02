<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function changeRole(Request $request)
    {

        User::find($request->id)->roles()->detach();

        if(count($request->role)>0){
            foreach ($request->role as $key=>$role){
                User::find($request->id)->roles()->attach(Role::where('name',$key)->first());
            }
        }

        return redirect()->back()->with(['message'=>'تغییر نقش با موفقیت انجام شد']);

    }

    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('roles.index')->with(['roles' => $roles , 'permissions' => $permissions]);
    }

    public function createRole(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'name' => 'required',
                'discription' => 'required'
            ]);
            if(Role::haveRole($request->name)){
                $errors = 'نقش '.$request->name.' موجود است';
                return redirect()->back()->withErrors($errors);
            }
            $role = new Role();
            $role->name = $request->name;
            $role->discription = $request->discription;
            $role->save();
            return redirect()->back()->with(['message' => 'نقش جدید ایجاد شد']);
        }
        return view('roles.create');
    }

    public function deleteRole(Request $request)
    {
        if ($request->isMethod('post')){
            $role = Role::where('id',$request->id)->first();
            $role->delete();
            return redirect()->back()->with(['message' => 'نقش '.$role->name.' حذف شد']);
        }
        $roles = Role::get();
        return view('roles.delete')->with(['roles' => $roles]);
    }
}
