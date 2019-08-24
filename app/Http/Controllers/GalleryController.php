<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UploadService;
use App\Gallery;
use App\Constants\Directory;

class GalleryController extends Controller
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
        $gallery = Gallery::all();
        return view('admin.galleries',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isAdd = true;
        return view('admin.gallery',compact('isAdd'));
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048'
          );
        // $validator = Validator::make($fileArray, $rules);
        $validator = Validator::make($request->all(), $rules);
        // Check to see if validation fails or passe

        $gallery = new Gallery();
        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($validator->fails()){
                $message = 'File không hợp lệ';
                return redirect()->back()->with('success', $message);
            }

            $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_GALLERY,$request->image);
        }
        $gallery->create($data);
        return redirect('admin/galleries');
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
        $isAdd = false;
        $gallery = Gallery::find($id);
        return view('admin.gallery',compact('isAdd','gallery'));
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

        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048'
          );
        
        $validator = Validator::make($request->all(), $rules);



        $gallery = Gallery::find($id);
        $image_old = $gallery->image;
        $data = $request->all();
        if ($validator->fails()){
            $message = 'File không hợp lệ';
            return redirect()->back()->with('success', $message);
        } else {
            if ($request->hasFile('image')) {
                $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_GALLERY,$request->image);
            }
        }

        $gallery->update($data);
        if($request->hasFile('image')){
            $this->fileUpload->removeImage($image_old);
        }
        return redirect('admin/galleries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $this->fileUpload->removeImage($gallery->image);
        $gallery->delete();
        return redirect('admin/galleries');
    }

    public function ajaxUpdate(Request $request, $id){
        
    }
}
