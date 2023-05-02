<?php
namespace App\Http\Controllers\Admin;

use Session;
use App\User;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function login(){
        if(Auth::check())
        {
           
            return redirect()->route('dashboard');
        }
        return view('main.pages.auth.login');
    }

    public function signUp(Request $request){
      
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            if(auth()->user()->role_id==1 || auth()->user()->role_id==3){
             
                return redirect()->route('dashboard');
            }else{
                Auth::logout();
                Session::flash('error', 'Only Admin can access this section!');
                return redirect()->back();
            }
        }
       
        Session::flash('error', 'Oops! You have entered invalid credentials');
   
        return redirect()->route('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}