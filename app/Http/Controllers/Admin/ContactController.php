<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
   public function index(){

    $contact = Contact::get();

    return view('main.pages.contact.index',['contact'=>$contact]);

   }

}
