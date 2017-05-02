<?php

namespace App\Http\Controllers;

use App\Service;
use App\State;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($id = null)
    {
        if($id){
            $service = Service::find($id);
            if(!$service){
                return response()->view('errors.404',[],404);
            }
            return view('services.show')->with('service',$service);
        }
        $services = Service::get();
        return view('services.index')->with('services',$services);
    }
    public function createService(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'name' => 'required',
                'discription' => 'required'
            ]);
            if(Service::haveService($request->name)){
                $errors = 'خدمت '.$request->name.' موجود است';
                return redirect()->back()->withErrors($errors);
            }
            $service = new Service();
            $service->name = $request->name;
            $service->discription = $request->discription;
            $service->save();
            return redirect()->back()->with(['message' => 'خدمت جدید ایجاد شد']);
        }
        return view('services.create');
    }

    public function deleteService(Request $request)
    {

        $service = Service::where('id',$request->id)->first();
        $service->delete();
        return redirect()->back()->with(['message' => 'خدمت '.$service->name.' حذف شد']);

    }

}
