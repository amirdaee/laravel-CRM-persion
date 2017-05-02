<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    public function index($id = null)
    {
        $states = State::get();
        if($id){
            $state = State::where('id',$id)->get();
            if($state->count()){
                return view('states.index')->with(['state' => $state->first()]);
            }
            return response("لطفا در انتخاب خود دقت کنید",401);
        }else{
            return view('states.index')->with(['states' => $states]);
        }

    }

    public function createState(Request $request)
    {

        if ($request->isMethod('post')) {
            $this->validate($request,[
                'name' => 'required',
                'service_id' => 'required',
                'position' => 'required'
            ]);

            if(State::haveState($request->name , $request->service_id)){
                $errors = 'مرحله '.$request->name.' در خدمات '.Service::where('id',$request->service_id)->first()->name.' موجود است';
                return redirect()->back()->withErrors($errors);
            }

            /*
             * check if position exist change position of state
             */
            $countState = State::where([
                ['position',$request->position],
                ['service_id',$request->service_id]
            ])->get()->count();
            if($countState){
                State::updatePosision(1 , $request->position , $request->service_id);
            }

            $state = new State();
            $state->name = $request->name;
            $state->service_id = $request->service_id;
            $state->position = $request->position;
            $state->save();
            return redirect()->back()->with(['message' => 'قدم جدید ایجاد شد']);
        }
        $services = Service::get()->all();
        return view('states.create')->with(['services' => $services]);
    }


    public function deleteState(Request $request,$id = null)
    {

        if ($request->isMethod('post')){

            $state = State::where('id',$request->id)->first();
            $position = $state->position;
            $service_id = $state->service_id;
            $state->delete();

            State::updatePosision(2 , $position , $service_id);
            return redirect()->back()->with(['message' => 'گام '.$state->name.' حذف شد']);
        }

        if($id){
            $state = State::where('id',$id)->get();
            if($state->count()){
                return view('states.delete')->with(['state' => $state->first()]);
            }
            return response("لطفا در  خود دقت کنید",401);
        }else{
            return redirect()->route('states');
        }
    }
}
