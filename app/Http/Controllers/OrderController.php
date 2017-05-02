<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id = null)
    {
        if($id){
            $order = Order::find($id);
            if(!$order){
                return response()->view('errors.404',[],404);
            }
            return view('orders.show')->with('order',$order);
        }
        $orders = Order::get();
        return view('orders.index')->with('orders' , $orders);
    }
}
