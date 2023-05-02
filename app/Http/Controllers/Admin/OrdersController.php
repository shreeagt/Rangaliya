<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Auth;
use Config;
use Storage;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrdersController extends Controller {
    public function showOrders(){
        //$orders=Order::all();
        $orders = DB::table('orders')
            ->join('order_product', 'order_product.id', '=', 'orders.id')
            ->select('order_product.*','orders.*')
            ->get();
//dd($orders);
        return view('main.pages.orders.browse',['orders'=>$orders]);
    }
    public function showOrderDetails($id){
        $order_details=Order::find($id);
        $products=OrderProduct::where('order_id','=',$id)->join('products','products.id','=','order_product.product_id')->select('*','order_product.quantity AS product_quantity')->get();
             
        return view('main.pages.orders.read',['order_details'=>$order_details,'products'=>$products]);
    }

    public function updateStatus(Request $request){
        
        $order_product=OrderProduct::find($request->id);

        $order_product->order_status=$request->status; 
        $order_product->save();

        $to_email = $request['billing_email'];
        
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['billing_name'] =  $request['billing_name'];
        $data['template_data']['order_status'] =  $order_product['order_status'];
        
        $helperfunction_res = changeStatus($data);
            
       $order_status = $order_product->order_status;
        return $order_status;
        
	}
}