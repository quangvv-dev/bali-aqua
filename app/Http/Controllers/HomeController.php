<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Article;
use App\Page;
use DB;
use Helper;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }
    public function products($slug = null)
    {
        $mainCate = null;
        if($slug){
            $mainCate = Category::whereType('1')->whereSlug($slug)->first();
            if(!isset($mainCate)) abort(404);

        }
        $categories = Category::whereType('1')->get();
        $category_id = isset($mainCate) ?  $mainCate->id : null;
        $categories = $this->buildMenu($categories,$category_id);
        return view('frontend.product-category')->with(compact('categories','mainCate'));
    }
    public function product($slug = null)
    {
        // $phone = DB::table('Setting')->select('phone')->get();
        // $phone = $phone[0]->phone;
        // $phone = json_decode($phone);
        // $product = Product::whereSlug($slug)->first();
        // if(!isset($product)) abort(404);
        // return view('frontend.product')->with(compact('product','phone'));
    }
    public function articles(Request $request)
    {
        $articles = Article::where('publish',1)->orderBy('created_at','desc')->orderBy('updated_at','desc')->paginate(9);
        return view('frontend.article-category')->with(compact('articles'));
    }
    public function page($slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('frontend.page')->with(compact('page'));
    }
    public function article($slug)
    {
        $article = Article::where('slug',$slug)->firstOrFail();
        $article->views++;
        $article->save();
        return view('frontend.article')->with(compact('article'));
    }
    public function buildMenu($items,$parent_id)
    {
        $rs = [];
        $rs_con = [];
        foreach ($items as $item) {
            if ($item->parent_id === $parent_id) {
                array_push($rs,$item);
            } else {
                array_push($rs_con,$item);
            }
        }
        if (count($rs_con) > 0) {
            foreach ($rs as $item) {
                $child = $this->buildMenu($rs_con, $item->id);
                if (count($child) > 0) {
                    $item->categories = $child;
                }
            }
        }
        return $rs;
    }
}
