@extends('layouts.admin')
@section('title', 'Cấu hình')
@section('pageTitle', 'Cấu hình')
@section('header-right')
<a href="{{url('admin/settings/create')}}"><button type="button" class="btn btn-block btn-primary">Thêm mới</button></a>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-striped dataTableFullFeature">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Banner</th>
                            <th>Title</th>
                            <th>Limit product</th>
                            <th>Copyright</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($setting as $st)
                        <tr>
                            <td><img src="{{isset($st->logo) ? url($st->logo) : ''}}" alt="{{isset($st->alt_logo) ? $st->alt_logo : ''}}"></td>
                            <td><img src="{{isset($st->banner) ? url($st->banner) : ''}}" alt="{{isset($st->banner) ? $st->alt_banner : ''}}"></td>
                            <td>{{isset($st->logo) ? $st->title : ''}}</td>
                            <td>{{isset($st->logo) ? $st->limit_product : 0}}</td>
                            <td>{{isset($st->logo) ? $st->copy_right : ''}}</td>
                            <td class="action">
                                <div class="btn-group">
                                    <form action="{{ url('admin/settings/'.$st->id) }}" method="POST">
                                        <a href="{{url('admin/settings/'.$st->id.'/edit')}}"
                                        class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Xóa</button> -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection