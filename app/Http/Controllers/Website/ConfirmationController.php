<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('Website.homerang');

        // return view('Website.thankyou');
    }
}