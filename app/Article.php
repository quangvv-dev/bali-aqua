<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id','title','description','content','slug','publish','views','metatitle','metadescription','image'];
    public function related($num)
    {
        return Article::where('id','!=',$this->id)->orderBy('created_at','desc')->orderBy('updated_at','desc')->take($num)->get();
    }
}
