<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','description','position','type'];
    public function items(){
        return $this->hasMany('App\MenuItem');
    }
}
