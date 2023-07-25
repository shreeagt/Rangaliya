<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $guarded = [];

    protected $table = 'category';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
