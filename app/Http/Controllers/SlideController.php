<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\UploadService;
use App\Slide;
use App\Constants\Directory;

class SlideController extends Controller
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
        $slide = Slide::all();
        return view('admin.slides',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isAdd = true;
        return view('admin.slide',compact('isAdd'));
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

        $slide = new Slide();
        $data = $request->all();
        $request->has('sidebar_qc') ? $data['sidebar_qc'] = 1 : $data['sidebar_qc'] = 0;
        if ($request->hasFile('image')) {
            if ($validator->fails()){
                $message = 'File không hợp lệ';
                return redirect()->back()->with('success', $message);
            }

            $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_SLIDE,$request->image);
        }
        $slide->create($data);
        return redirect('admin/slides');
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
        $slide = Slide::find($id);
        return view('admin.slide',compact('isAdd','slide'));
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



        $slide = Slide::find($id);
        $image_old = $slide->image;
        $data = $request->all();
        // $request->has('sidebar_qc') ? $data['sidebar_qc'] = 1 : $data['sidebar_qc'] = 0;
        $data['sidebar_qc'] = $request->has('sidebar_qc') == true ? 1 : 0;
        // dd($request->has('sidebar_qc'));
        if ($validator->fails()){
            $message = 'File không hợp lệ';
            return redirect()->back()->with('success', $message);
        } else {
            if ($request->hasFile('image')) {
                $data['image'] = $this->fileUpload->uploadImage(Directory::UPLOAD_SLIDE,$request->image);
            }
        }

        $slide->update($data);
        if($request->hasFile('image')){
            $this->fileUpload->removeImage($image_old);
        }
        return redirect('admin/slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $this->fileUpload->removeImage($slide->image);
        $slide->delete();
        return redirect('admin/slides');
    }

    public function ajaxUpdate(Request $request, $id){
        $slide = Slide::find($id);
        $slide->sidebar_qc = $request->sidebar_qc =='true' ? 1 : 0;
        $slide->save();
    }
}
