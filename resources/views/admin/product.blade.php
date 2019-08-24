@extends('layouts.admin')
@section('title', $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm')
@section('pageTitle', $isEdit ? 'Sửa sản phẩm' : 'Thêm sản phẩm')
@section('header-right')
<button type="button" class="btn btn-block btn-primary btn-save-alter">{{ $isEdit ? 'Lưu sản phẩm' : 'Lưu sản phẩm' }}</button>
@endsection
@section('content')
<form class="" action="{{url('admin/products/')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
    <input type="hidden" name="id" value="{{$product->id}}">
    @endif
    <div class="box box-primary">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">Thêm sản phẩm mới</h3> -->
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="control-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề"
                            value="{{isset($product) ? $product->title : ''}}" onchange="return ChangeToSlug()">
                    </div>

                    <div class="form-group">
                        <label for="category_id" class="control-label">Danh mục</label>
                        <div class="">
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                @foreach($categories as $category)
                                <option
                                    {{(isset($product) && $product->category_id == $category->id) ? 'selected="selected"' : ''}}
                                    value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sku" class="control-label">SKU</label>

                        <div class="">
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU"
                                value="{{isset($product) ? $product->sku : ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="the_tich" class="control-label">Thể tích</label>
                        <div class="">
                            <input type="text" class="form-control" id="the_tich" name="the_tich" placeholder="Thể tích"
                                value="{{isset($product) ? $product->the_tich : ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label">Giá</label>
                        <div class="">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Giá"
                                value="{{isset($product) ? $product->price : ''}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        @php
                        $images = isset($product) && isset($product->images) && $product->images !='' ? json_decode($product->images) : json_decode('[]');
                        @endphp
                        <label for="images" class="control-label alt-flex"><span>Ảnh</span><a class="addImages">Upload
                                ảnh</a></label>
                        <input type="file" class="hidden images" multiple="multiple" id="images" name="images[]">
                        <input type="hidden" id="images_json" name="images_json" value="{{json_encode($images)}}">
                        <div class="">
                            <div class="imagesUploadBox product-images">
                                <div class="main-image product-photo-grid__item">
                                    @if(isset($images[0]))
                                    <div class="thumb-image">
                                        <img class="" data-src="{{$images[0]->url}}" src="{{url($images[0]->url)}}"
                                            alt="{{$images[0]->alt}}">
                                        <div class="overlay">
                                            <div class="alter-button" data-toggle="modal" data-target="#modal-alt">Alt</div>
                                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="thumb-list product-photo-grid__item">
                                    @foreach($images as $k => $image)
                                    @if($k!= 0)
                                    <div class="thumb-image">
                                        <img class="" data-src="{{$image->url}}" src="{{url($image->url)}}"
                                            alt="{{$image->alt}}">
                                        <div class="overlay">
                                            <div class="alter-button" data-toggle="modal" data-target="#modal-alt">Alt</div>
                                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Mô tả</label>
                <div class="">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả"
                        value="{{isset($product) ? $product->description : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="control-label">Nội dung</label>
                <div class="">
                    <textarea id='content' class="editor" name="content" rows="10"
                        cols="80">{{isset($product) ? $product->content : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="publish" @if(isset($product) && $product->publish) checked
                            @endif value=1>Hiển thị
                        </label>
                    </div>
                </div>
                <div class="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="isFeatured" @if(isset($product) && $product->isFeatured) checked
                                @endif value=1>Hiển thị trên trang chủ
                            </label>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="metatitle" class="control-label">Meta title</label>
                <div class="">
                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder=""
                        value="{{isset($product) ? $product->metatitle : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="metadescription" class="control-label">Meta description</label>
                <div class="">
                    <textarea id='metadescription' class="" name="metadescription" rows="5"
                        style="width:100%;resize:vertical">{{isset($product) ? $product->metadescription : ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="slug" class="control-label">Slug</label>
                <div class="">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="tieu-de"
                        value="{{isset($product) ? $product->slug : ''}}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{url('admin/products')}}" class="btn btn-default">Quay lại</a>
            <button type="submit" class="btn btn-info pull-right">Lưu</button>
        </div>
    </div>
</form>
<div class="modal fade" id="modal-alt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cập nhật mô tả</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="altText" class="col-sm-2 control-label">Alter text</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="altText" placeholder="Alter text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Hủy bỏ</button>
                <button type="button" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('footerScript')
<script>
readURL = async function(input, callback) {
    var fileList = []
    for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        var count = 0;
        reader.onload = function(e) {
            fileList.push({
                src: e.target.result,
                name: input.files[count].name
            })
            count++
            if (count == input.files.length) {
                callback(fileList)
            }
        }
        reader.readAsDataURL(input.files[i]);
    }
}
$(document).ready(function() {
    $('#modal-alt').on('show.bs.modal', function(e) {
        $(e.target).find('#altText').val('')
        $(e.target).find('.btn-primary').removeAttr('data-pos')

        var alt = $(e.relatedTarget).closest('.thumb-image').find('img').attr('alt')
        var pos = $(e.relatedTarget).closest('.thumb-image').index('.imagesUploadBox .thumb-image')
        $(e.target).find('#altText').val(alt)
        $(e.target).find('.btn-primary').attr('data-pos',pos)
    })
    $('#modal-alt .btn-primary').on('click',function(){
        var pos = $(this).attr('data-pos')
        var value = $(this).closest('#modal-alt').find('#altText').val()
        $('.imagesUploadBox .thumb-image').eq(pos).find('img').attr('alt',value)
        $('#modal-alt').modal('hide')
        updateImagesJSON()
    })
    function updateImagesJSON() {
        var list = [];
        $('.thumb-image').each(function(index, image) {
            list.push({
                position: index,
                url: $(image).find('img').attr('data-src'),
                alt: $(image).find('img').attr('alt')
            })
        })
        $('#images_json').val(JSON.stringify(list))
    }
    $('body').on('click','.imagesUploadBox .remove-button', function() {
        $(this).closest('.thumb-image').remove()
        updateImagesJSON()
    });
    $('input.images').on('change', function() {
        readURL(this, function(fileList) {
            var curList = JSON.parse($('#images_json').val())
            var totallyNew = $('.thumb-image:not(.new)').length == 0 ? true : false
            curList = curList.filter((item) => typeof item.new === 'undefined')

            var last_position = curList.length ? curList[curList.length - 1].position : -1
            fileList.forEach((file) => {
                curList.push({
                    position: ++last_position,
                    url: file.src,
                    alt: '',
                    new: true,
                    fileName: file.name
                })
            })
            var html = '',
                html_main = ''
            $('.product-images').find('.thumb-image.new').remove();
            curList.forEach((item, index) => {
                if (item.new && index != 0) {
                    html += `<div class="thumb-image new">
                        <img class="" src="` + item.url + `" alt="` + item.alt + `">
                        <div class="overlay">
                            <div class="alter-button">Alt</div>
                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                        </div>
                    </div>`
                }
                if (index == 0) {
                    html_main = `<div class="thumb-image new">
                        <img class="" src="` + item.url + `" alt="` + item.alt + `">
                        <div class="overlay">
                            <div class="alter-button">Alt</div>
                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                        </div>
                    </div>`
                }
            })
            if (totallyNew) {
                $('.main-image').append(html_main)
            }
            $('.thumb-list').append(html)
            $('#images_json').val(JSON.stringify(curList))
        });
    })
})
</script>
@endsection