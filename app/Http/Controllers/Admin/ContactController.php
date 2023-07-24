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
   public function storecontact(Request $request)
{
    $scontact = new Contact;
    $scontact->name = $request->input('name');
    $scontact->email = $request->input('email');
    $scontact->message = $request->input('message');
    $scontact->state = $request->input('inputState');
    $scontact->city = $request->input('inputDistrict'); // Corrected the input name here
    $scontact->mobile = $request->input('tel');

    $scontact->save();

    return redirect()->route('contact');
}

}
