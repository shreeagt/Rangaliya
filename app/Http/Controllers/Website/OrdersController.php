<?php

namespace App\Http\Controllers\Website;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders; // n + 1 issues

        $orders = Order::where('user_id','=',auth()->user()->id)->get(); // fix n + 1 issues

        return view('Website.my-orders')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {   
       
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }
       
        $products = $order->products;
       
        return view('website.order-details')->with([
            'order' => $order,
            'products' => $products,
        ]);
    }


}