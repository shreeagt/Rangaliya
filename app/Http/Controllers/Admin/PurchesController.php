<?php

namespace App\Http\Controllers\Admin;


use Auth;
use Config;
use Storage;
use App\Model\Order;
use App\Model\Product;
use App\Model\Purchaselog;
use App\Model\OrderProduct;
use App\Model\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class PurchesController extends Controller {
    public function showPurches(){
      
        $product=Product::get();
       
       $Purchaselog=Purchaselog::get();
    // $Purchaselog = DB::table('purchase_log')
    // ->join('products', 'purchase_log.product_title', '=', 'products.id')
    
    // ->select('*')
    // ->get();
     //dd($Purchaselog);
        return view('main.pages.purches.browse',['product'=>$product,'Purchaselog'=>$Purchaselog]);
    }
    public function purchesEntry(){
        $product=Product::all();
      
        return view('main.pages.purches.create',['product'=>$product]);
    }

    // public function storePurchase(Request $request){
    //         $pid = $request->product;
    //          $product=Product::where('product_title','=',$pid)->get();
    //          foreach($product as $item){
    //             $item->quantity;
    //          }
    //          //dd($item->quantity);
             
    //          $purchase=new purchase();
    //          $purchase->product_title=$request->product;
    //          $purchase->quantity=$request->quantity+ $item->quantity;
    //          $purchase->hsn=$request->hsn;
    //          $purchase->billing_number=$request->billing_number;
      
    //          //dd($purchase->quantity);
    //          $purchase->save();
    //          $a = $purchase->product_title;
    //          $q = $purchase->quantity;
    //          $newproduct = Product::where('product_title','=',$a)->update(['quantity'=>$q]);
    //          return redirect()->route('purches.index')->with('success_message','Coupon Created Successfully!');
            
             
           
             
     
    //      }

         public function storePurchase(Request $request){
            //dd($request);
            $pid = $request->product;
            //dd($pid);
             $products=Product::where('product_title','=',$pid)->get();
             //dd('hii');
             $newproduct = Product::where('product_title','=',$pid)->update(['quantity'=>$request->quantity+$products[0]->quantity]);
             
             $purchase=new purchase();
             $purchase->product_title=$request->product;
             $purchase->quantity=$request->quantity;
             $purchase->hsn=$request->hsn;
             $purchase->billing_number=$request->billing_number;
             $purchase->save();
            
             return redirect()->route('purches.index')->with('success_message','purchase Created Successfully!');  
     
         }

   
    
}