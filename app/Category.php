<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title','slug','description','content','position','parent_id','type','metatitle','metadescription','image'
    ];
    public function parent()
    {
        return $this->belongsTo('App\Category','parent_id')->where('parent_id',0)->with('parent');
    }
    public function children()
    {
        return $this->hasMany('App\Category','parent_id')->with('children');
    }
    public function categories() {
        return $this->hasMany('App\Category', 'parent_id');
    }
    public function parent_category() {
        return $this->belongsTo('App\Category', 'parent_id');
    }
    public function products() {
        return $this->hasMany('App\Product');
    }
    public function allProducts($num = 4) {
        $products = [];
        $child1Categories = $this->children;
        $products = array_merge($products,$this->products->toArray());
        if(isset($child1Categories) && count($child1Categories)){
            foreach ($child1Categories as $key => $child1Category) {
                $products = array_merge($products,$child1Category->products->toArray());
                $child2Categories = $child1Category->children;
                if(isset($child2Categories) && count($child2Categories) > 0){
                    foreach ($child2Categories as $key => $child2Category) {
                        $products = array_merge($products,$child2Category->products->toArray());
                    }
                }
            }
        }
        return collect($products)->sortByDesc('created_at')->splice(0, $num);
    }
    public static function getCategories($type = 1)
    {
        $categories = Category::whereParentId(null)->whereType($type)->get();
        foreach ($categories as $key => $category) {
            $category->categories = $category->categories;
        }
        return $categories;
    }
    public function relatedCategory()
    {
        return Category::whereParentId($this->parent_id)->get();
    }
}