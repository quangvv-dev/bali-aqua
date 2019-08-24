@extends('layouts.admin')
@section('title',  $isAdd ? 'Thêm mới danh mục' : 'Cập nhật danh mục')
@section('pageTitle', $isAdd ? 'Thêm mới danh mục' : 'Cập nhật danh mục')
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
                    action="{{$isAdd ? url('admin/category') : url('admin/category/'.$category->id)}}"
                    enctype="multipart/form-data"
                    method="post">
                    @method($isAdd ? 'post' : 'put')
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="title" class="col-sm-2 control-label">Tiêu đề</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                                        value="{{isset($category) ? $category->title: ''}}"
                                        onchange="return ChangeToSlug()">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug" class="col-sm-2 control-label">Slug</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                        value="{{isset($category) ? $category->slug: ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3"
                                        placeholder="Description" name="description"
                                        value="{{isset($category) ? $category->description: ''}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Vị trí</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="inputPassword3" name="position">
                                        @for($i = 0; $i < 10; $i++) <option value={{$i}}
                                            {{isset($category) && $category->position == $i ? 'selected' : ''}}> {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Meta title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Meta title"
                                        name="metatitle" value="{{isset($category) ? $category->metatitle: ''}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Meta description</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control textarea" name="metadescription"
                                        placeholder="Meta description" cols="30" rows="3"
                                        value="{{isset($category) ? $category->metadescription: ''}}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Parent</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputPassword3" name="parent_id">
                                        <option value="">Mặc định</option>
                                        @if ($isAdd )
                                        @foreach($categories as $category1)
                                        <option value={{$category1->id}}>{{$category1->title}}</option>
                                        @endforeach
                                        @else
                                        @foreach($categories_filter as $category1)
                                        <option value={{$category1->id}}
                                            {{$category && $category->parent_id == $category1->id ? 'selected' : ''}}>
                                            {{$category1->title}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputPassword3" name="type">
                                        <option value=0 {{isset($category) && $category->type == 0 ? 'selected' : ''}}>
                                            Bài viết</option>
                                        <option value=1 {{isset($category) && $category->type == 1 ? 'selected' : ''}}>
                                            Sản phẩm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword3" class="col-sm-2 control-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div> --}}

                        @if (session('success'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="col-md-1 col-sm-2 control-label">Nội dung</label>
                                <div class="col-md-11 col-sm-10 editor-category">
                                    <textarea id="editor1" name="content" rows="10" cols="80" class="editor">
                                        {{isset($category) && $category->content ? $category->content : ''}}
                                    </textarea>
                                </div>
                                <!-- /.col-->
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{url('admin/category')}}"><button class="btn btn-default">Hủy bỏ</button></a>
                        <button type="submit" class="btn btn-info pull-right">Lưu lại</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection