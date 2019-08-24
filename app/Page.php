<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Page extends Model
{
    protected $fillable = ['title','description','content','slug','publish','metatitle','metadescription'];
}