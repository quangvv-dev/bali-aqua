<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['menu_id','title','url','position','external'];
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
