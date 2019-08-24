<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use App\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->orderBy('id','desc')->get();
        return view('admin.products')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isEdit = false;
        $categories = Category::where('type',1)->get();
        return view('admin.product')->with(compact('isEdit','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
        $images_json = json_decode($request->input('images_json'));
        
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $path = $file->store('');
                $file->move('images/product',$path);
                foreach($images_json as $image){
                    if(isset($image->fileName) && $image->fileName == $name){
                        $image->url = '/images/product/'.$path;
                    }
                }
            }
        }
        foreach($images_json as $image){
            if(isset($image->fileName)){
                unset($image->fileName);
            }
            if(isset($image->new)){
                unset($image->new);
            }
        }
        $data = $request->all();
        $data['images'] = json_encode($images_json);
        if($request->has('id')){
            $product = Product::find($request->input('id'));
            $product->publish = $request->has('publish');
            $product->update($data);
        }else{
            $product = Product::create($data);
        }
        
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isEdit = true;
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product')->with(compact('isEdit','product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function all(Request $request)
    {
        return response()->json(Product::all());
    }
}
