@extends('layouts.admin')
@section('title', $isEdit ? 'Sửa bài viết' : 'Thêm bài viết')
@section('pageTitle', $isEdit ? 'Sửa bài viết' : 'Thêm bài viết')
@section('header-right')
<button type="button" class="btn btn-block btn-primary">{{ $isEdit ? 'Lưu bài viết' : 'Lưu bài viết' }}</button>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">Thêm bài viết mới</h3> -->
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{url('admin/articles')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            @if(isset($article))
            <input type="hidden" name="id" value="{{$article->id}}">
            @endif
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Tiêu đề</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề"
                        value="{{isset($article) ? $article->title : ''}}" onchange="return ChangeToSlug()">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="col-sm-2 control-label">Danh mục</label>
                <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="category_id">
                        @foreach($categories as $category)
                        <option
                            {{(isset($article) && $article->category_id == $category->id) ? 'selected="selected"' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Mô tả</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả"
                        value="{{isset($article) ? $article->description : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Nội dung</label>

                <div class="col-sm-10">
                    <textarea id='content' class="editor" name="content" rows="10"
                        cols="80">{{isset($article) ? $article->content : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Hiển thị</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="publish" @if(isset($article) && $article->publish) checked
                            @endif value=1>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="metatitle" class="col-sm-2 control-label">Meta title</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder=""
                        value="{{isset($article) ? $article->metatitle : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="metadescription" class="col-sm-2 control-label">Meta description</label>

                <div class="col-sm-10">
                    <textarea id='metadescription' class="" name="metadescription" rows="5"
                        style="width:100%">{{isset($article) ? $article->metadescription : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="slug" class="col-sm-2 control-label">Slug</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="tieu-de"
                        value="{{isset($article) ? $article->slug : ''}}">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{url('admin/articles')}}" class="btn btn-default">Quay lại</a>
            <button type="submit" class="btn btn-info pull-right">Lưu</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
@endsection