<?php

namespace App\Model;

use Mail;
// use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $table = "contacts";

    public $fillable = ['name', 'email','message'];
    use HasFactory;


    // public static function boot() {
  
    //     parent::boot();
  
    //     static::created(function ($item) {
                
    //         $adminEmail = "suryaprakashtiwari01@gmail.com";
    //         Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }
    
}

  
/**
 * Write code on Method
 *
 * @return response()
 */

