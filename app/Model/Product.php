<?php

namespace App\Model;

// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    protected $guarded = [];

    protected $table = "products";
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
