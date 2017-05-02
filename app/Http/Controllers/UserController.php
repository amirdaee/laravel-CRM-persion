<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;

class UserController extends Controller
{
    protected $login_name;
    protected $password;

    public function logIn(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'login_name' => 'required',
                'password' => 'required'
            ]);

            if(Auth::attempt(['login_name'=>$request['login_name'],'password'=>$request['password']])){
                return redirect()->route('home');
            }
            return redirect()->back();
        }
        if(Auth::user()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function signUp(Request $request){

        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required|max:60',
                'login_name' => 'required|unique:users|max:60',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->login_name = $request->login_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->roles()->attach(Role::where('name','Customer')->first());
            if(Auth::user()){
                if(Auth::user()->hasRoles('Admin')){
                    return redirect()->back()->with(['message' => 'کاربر جدید ایجاد شد']);
                }
            }
            else{
                Auth::login($user,true);
                return redirect()->route('home');
            }
        }
        return view('users.create');
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/');
    }

    public function index(Request $request)
    {
        if($request->isMethod('post')){
            if($request->has('delete_user')){
                User::where('id',$request->id)->first()->delete();
            }
        }
        $users = User::get();
        $roles = Role::get();
        return view('users.index')->with(['users'=>$users,'roles'=>$roles]);
    }
    
}
