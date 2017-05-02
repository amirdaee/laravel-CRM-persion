<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function changePermission(Request $request)
    {

        Role::find($request->id)->permissions()->detach();

        if(count($request->permission)>0){
            foreach ($request->permission as $key=>$permission){
                Role::find($request->id)->permissions()->attach(Permission::where('name',$key)->first());
            }
        }


        return redirect()->back()->with(['message'=>'تغییر دسترسی با موفقیت انجام شد']);

    }

    public function index()
    {
        return redirect()->route('permissions.delete');
    }

    public function createPermission(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'name' => 'required',
                'discription' => 'required'
            ]);
            if(Permission::havePermission($request->name)){
                $errors = 'دسترسی '.$request->name.' موجود است';
                return redirect()->back()->withErrors($errors);
            }
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->discription = $request->discription;
            $permission->save();
            return redirect()->back()->with(['message' => 'دسترسی جدید ایجاد شد']);
        }
        return view('permissions.create');
    }


    public function deletePermission(Request $request)
    {
        if ($request->isMethod('post')){
            $permission = Permission::where('id',$request->id)->first();
            $permission->delete();
            return redirect()->back()->with(['message' => 'نقش '.$permission->discription.' حذف شد']);
        }
        $permissions = Permission::get();
        return view('permissions.delete')->with(['permissions' => $permissions]);
    }
}
