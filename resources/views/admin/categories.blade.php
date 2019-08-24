@extends('layouts.admin')
@section('title', 'Danh mục '.$type)
@section('pageTitle', 'Danh mục '.$type)
@section('header-right')
<a href="{{url('admin/category/create')}}"><button type="button" class="btn btn-block btn-primary">Thêm mới</button></a>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div> -->
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped dataTableFullFeature">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Vị trí</th>
                            <th>Meta title</th>
                            <th>Meta description</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->position}}</td>
                            <td>{{$category->metatitle}}</td>
                            <td>{{$category->metadescription}}</td>
                            <td class="action">
                                <div class="btn-group">
                                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST">
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}"
                                            class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            <th>CSS grade</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection