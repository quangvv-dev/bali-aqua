<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadService;
use App\Constants\Directory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Setting;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $fileUpload;

    public function __construct(UploadService $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    public function index()
    {
        $setting = Setting::all();
        return view('admin.settings',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // dd("Không chơi thế đâu!");
        $isAdd = true; 
        return view('admin.setting',compact('isAdd'));
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
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
            'banner' => 'mimes:jpeg,jpg,png,gif|required|max:2048'
          );
        // $validator = Validator::make($fileArray, $rules);
        $validator = Validator::make($request->all(), $rules);
        // Check to see if validation fails or passe

        $setting = new Setting();
        $data = $request->all();
        if ($request->hasFile('logo')) {
            if ($validator->fails()){
                $message = 'File không hợp lệ';
                return redirect()->back()->with('success', $message);
            }
            $data['logo'] = $this->fileUpload->uploadImage(Directory::UPLOAD_LOGO,$request->logo);
        }
        if ($request->hasFile('banner')) {
            if ($validator->fails()){
                $message = 'File không hợp lệ';
                return redirect()->back()->with('success', $message);
            }
            $data['banner'] = $this->fileUpload->uploadImage(Directory::UPLOAD_BANNER,$request->banner);
        }
        $setting->create($data);
        return redirect('admin/settings');
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
        $setting = Setting::find($id);
        // dd($setting->phone);
        return view('admin.setting',compact('isAdd','setting'));
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
            'logo' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'banner' => 'mimes:jpeg,jpg,png,gif|max:2048'
          );
        // $validator = Validator::make($fileArray, $rules);
        $validator = Validator::make($request->all(), $rules);


        $setting = Setting::find($id);
        $logo_old = $setting->logo;
        $banner_old = $setting->banner;
        $data = $request->all();
        if ($validator->fails()){
            $message = 'File không hợp lệ';
            return redirect()->back()->with('success', $message);
        } else {
            if ($request->hasFile('logo')) {
                $data['logo'] = $this->fileUpload->uploadImage(Directory::UPLOAD_LOGO,$request->logo);
            }
            if ($request->hasFile('banner')) {
                $data['banner'] = $this->fileUpload->uploadImage(Directory::UPLOAD_BANNER,$request->banner);
            }
        }
        $setting->update($data);
        if($request->hasFile('logo')){
            $this->fileUpload->removeImage($logo_old);
        }
        if($request->hasFile('banner')){
            $this->fileUpload->removeImage($banner_old);
        }
        return redirect('admin/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $this->fileUpload->removeImage($setting->logo);
        $this->fileUpload->removeImage($setting->image);
        $setting->delete();
        return redirect('admin/settings');
    }
}