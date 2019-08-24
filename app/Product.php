<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'title', 'slug', 'content', 'category_id', 'description','the_tich', 'price', 'images', 'publish','isFeatured', 'views', 'metatitle', 'metadescription'];
    public function category() {
        return $this->belongsTo('App\Category');
    }
}

