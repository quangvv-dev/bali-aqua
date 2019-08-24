<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\Validator;
use App\Services\UploadService;
use App\Constants\Directory;

class ArticleController extends Controller
{
    private $fileUpload;

    public function __construct(UploadService $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at','desc')->orderBy('id','desc')->get();
        return view('admin.articles')->with(compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isEdit = false;
        $categories = Category::where('type',0)->get();
        return view('admin.article')->with(compact('isEdit','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048'
          );
        $validator = Validator::make($request->all(), $rules);

        $data = $request->all();
        if($request->has('id')){
            // edit
            $article = Article::find($request->input('id'));
            if ($request->hasFile('image')) {
                if ($validator->fails()){
                    $message = 'File không hợp lệ';
                    return redirect()->back()->with('success', $message);
                }
    
                $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_ARTICLE,$request->image);
            }
            $article->publish = $request->has('publish');
            $article->update($data);
        }else{
            // create
            if ($request->hasFile('image') && $validator->fails()){
                $message = 'File không hợp lệ';
                dd($validator->fails());
                return redirect()->back()->with('success', $message);
            } else {
                if ($request->hasFile('image')) {
                    $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_ARTICLE,$request->image);
                }
            }
            $article = Article::create($data);
        }
        return redirect('admin/articles');
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
        $article = Article::find($id);
        $categories = Category::all();
        return view('admin.article')->with(compact('isEdit','article','categories'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    public function all(Request $request)
    {
        return response()->json(Article::all());
    }

}
