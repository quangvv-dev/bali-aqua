@extends('layouts.admin')
@section('title', $isEdit ? 'Sửa trang' : 'Thêm trang')
@section('pageTitle', $isEdit ? 'Sửa trang' : 'Thêm trang')
@section('header-right')
<button type="button" class="btn btn-block btn-primary">{{ $isEdit ? 'Lưu trang' : 'Lưu trang' }}</button>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">Thêm trang mới</h3> -->
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{url('admin/pages')}}" method="post">
        @csrf
        <div class="box-body">
            @if(isset($page))
            <input type="hidden" name="id" value="{{$page->id}}">
            @endif
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Tiêu đề</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề"
                        value="{{isset($page) ? $page->title : ''}}" onchange="return ChangeToSlug()">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Nội dung</label>

                <div class="col-sm-10">
                    <textarea id='content' class="editor" name="content" rows="10"
                        cols="80">{{isset($page) ? $page->content : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="publish" @if(isset($page) && $page->publish) checked
                            @endif value=1>Hiển thị
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="metatitle" class="col-sm-2 control-label">Meta title</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder=""
                        value="{{isset($page) ? $page->metatitle : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="metadescription" class="col-sm-2 control-label">Meta description</label>

                <div class="col-sm-10">
                    <textarea id='metadescription' class="" name="metadescription" rows="5"
                        style="width:100%">{{isset($page) ? $page->metadescription : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="slug" class="col-sm-2 control-label">Slug</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="tieu-de"
                        value="{{isset($page) ? $page->slug : ''}}">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{url('admin/pages')}}" class="btn btn-default">Quay lại</a>
            <button type="submit" class="btn btn-info pull-right">Lưu</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
@endsection