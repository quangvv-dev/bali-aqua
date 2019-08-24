@extends('layouts.admin')
@section('title', $isAdd ? 'Thêm mới Cấu hình' : 'Cập nhật Cấu hình')
@section('pageTitle', $isAdd ? 'Thêm mới Cấu hình' : 'Cập nhật Cấu hình')
@section('header-right')
<!-- <a href="{{url('admin/category/create')}}"><button type="button" class="btn btn-block btn-primary">Thêm mới</button></a> -->
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Horizontal Form</h3> -->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal"
                    action="{{$isAdd ? url('admin/settings') : url('admin/settings/'.$setting->id)}}" method="post"
                    enctype="multipart/form-data">
                    @method($isAdd ? 'post' : 'put')
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title" class="col-sm-2 control-label">Tiêu đề</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                                        value="{{ $isAdd ? '' : $setting->title }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="limit_product" class="col-sm-2 control-label">Limit product home</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="limit_product" placeholder=""
                                        name="limit_product" value="{{ $isAdd ? 8 : $setting->limit_product }}">
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Menu Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="logo">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword" class="col-sm-2 control-label">Banner</label>
                                <div class="col-sm-10">
                                    <input type="file" name="banner">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="alt_logo" class="col-sm-2 control-label">Alt Menu logo</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alt_logo" placeholder="alt logo"
                                        name="alt_logo" value="{{ $isAdd ? '' : $setting->alt_logo }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alt_banner" class="col-sm-2 control-label">Alt banner</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alt_banner" placeholder="alt banner"
                                        name="alt_banner" value="{{ $isAdd ? '' : $setting->alt_banner }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="hotline" class="col-sm-2 control-label">Hotline</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hotline" placeholder="Hotline"
                                        name="hotline" value="{{ $isAdd ? '' : $setting->hotline }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" placeholder="Phone"
                                        name="phone" value="{{ $isAdd ? '' : $setting->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="caption_gallery_box" class="col-sm-2 control-label">Caption Gallery Box</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="caption_gallery_box" placeholder=""
                                            name="caption_gallery_box" value="{{ $isAdd ? '' : $setting->caption_gallery_box }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="url_gallery_box" class="col-sm-2 control-label">URL Gallery Box</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="url_gallery_box" placeholder=""
                                                name="url_gallery_box" value="{{ $isAdd ? '' : $setting->url_gallery_box }}">
                                        </div>
                                    </div>
                            </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="follow_us_at" class="col-sm-2 control-label">Follow us at</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="follow_us_at" placeholder=""
                                        name="follow_us_at" value="{{ $isAdd ? '' : $setting->follow_us_at }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="fanpage" class="col-sm-2 control-label">Facebook Fanpage</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fanpage" placeholder=""
                                            name="fanpage" value="{{ $isAdd ? '' : $setting->fanpage }}">
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="copy_right" class="col-sm-2 control-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="copy_right" placeholder=""
                                        name="copy_right" value="{{ $isAdd ? '' : $setting->copy_right }}">
                                </div>
                            </div>
                            
                        </div>


                        @if (session('success'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{url('admin/settings')}}" class="btn btn-default">Hủy bỏ</a>
                        <button type="submit" class="btn btn-info pull-right">Lưu lại</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection