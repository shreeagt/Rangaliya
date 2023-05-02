<?php

namespace App\Http\Controllers\Admin;


use Validator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Model\Coupon;

class CouponsController extends Controller
{
    public function showCoupons(){
        $coupons=Coupon::get();
        return view('main.pages.coupons.show',['coupons'=>$coupons]);
    }
    public function createCouponPage(){

        return view('main.pages.coupons.create');
    }
    public function editCouponPage($id){
        $coupon=Coupon::find($id);
        return view('main.pages.coupons.edit',['coupon'=>$coupon]);
    }
    public function storeCoupon(Request $request){
        if(isset($request->coupon_id) && $request->coupon_id!=null){
            $coupon=Coupon::find($request->coupon_id);
        $coupon->code=$request->code;
        $coupon->type=$request->type;
        $coupon->value=$request->value;
        $coupon->percent_off=$request->percent_off;
        $coupon->save();
        return redirect()->route('coupons.show')->with('success_message','Coupon Edited Successfully!');
        }else{
        $coupon=new Coupon();
        $coupon->code=$request->code;
        $coupon->type=$request->type;
        $coupon->value=$request->value;
        $coupon->percent_off=$request->percent_off;
        $coupon->save();
        return redirect()->route('coupons.show')->with('success_message','Coupon Created Successfully!');
        }
    }

    public function deleteCoupon($id){
        Coupon::find($id)->delete();
        return redirect()->back()->with('success_message','Coupon Deleted Successfully!');
    }
}