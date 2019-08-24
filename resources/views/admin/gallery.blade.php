@extends('layouts.admin')
@section('title', $isAdd ? 'Thêm mới gallery' : 'Cập nhật gallery')
@section('pageTitle', $isAdd ? 'Thêm mới gallery' : 'Cập nhật gallery')
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
                    action="{{$isAdd ? url('admin/galleries') : url('admin/galleries/'.$gallery->id)}}" method="post"
                    enctype="multipart/form-data">
                    @method($isAdd ? 'post' : 'put')
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="url" class="col-sm-2 control-label">Url</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="url" placeholder="url" name="url"
                                        value="{{ $isAdd ? '' : $gallery->url }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="caption" class="col-sm-2 control-label">Tiêu đề</label>
    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="caption" placeholder="Tiêu đề"
                                            name="caption" value="{{ $isAdd ? 1 : $gallery->caption }}">
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="position" class="col-sm-2 control-label">Thứ tự</label>
    
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="position" placeholder=""
                                            name="position" value="{{ $isAdd ? 1 : $gallery->position }}">
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
                        <a href="{{url('admin/galleries')}}" class="btn btn-default">Hủy bỏ</a>
                        <button type="submit" class="btn btn-info pull-right">Lưu lại</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection