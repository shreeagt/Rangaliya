<?php

namespace App\Models;

// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'product_title',
        'description',
        'product_url',
        'category',
        'price',
        'quantity',
        'images',
        'status',
        'best_seller',
        'home',
        'sub_services',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        'og_title',
        'og_desc',
        'og_image',
    ];
}
