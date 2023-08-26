<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNewImage extends Model
{
    protected $table = 'product_new_images';
    protected $fillable = [
        'product_image',
        'product_video',
        'youtube_link'
    ];
}
