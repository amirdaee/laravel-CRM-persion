<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }
    public function getImage($filename)
    {
        $file = Storage::disk('local')->get('img/'.$filename);
        return new Response($file, 300);
    }
}
