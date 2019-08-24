@extends('layouts.admin')
@section('title', $isEdit ? 'Sửa menu' : 'Thêm menu')
@section('pageTitle', $isEdit ? 'Sửa menu' : 'Thêm menu')
@section('header-right')
<button type="button" class="btn btn-block btn-primary">{{ $isEdit ? 'Lưu menu' : 'Lưu menu' }}</button>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">Thêm menu mới</h3> -->
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{url('admin/menus')}}" method="post">
        @csrf
        <div class="box-body">
            @if(isset($menu))
            <input type="hidden" name="id" value="{{$menu->id}}">
            @endif
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Tiêu đề</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề"
                        value="{{isset($menu) ? $menu->title : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Menu Items</label>
                <div class="col-sm-10">
                    
                    
                        <input type="hidden" class="menu_items_json" name="menu_items_json" value="{{isset($menuItems) ? json_encode($menuItems) : '{}' }}">
                        <input type="hidden" class="menu_items_destroy" name="menu_items_destroy" value="">
                        <table class="table table-striped menuItems">
                            <tbody class="sortable">
                                @if(isset($menuItems) && count($menuItems))
                                @foreach($menuItems as $item)
                                    <tr class='item' data-id="{{$item->id}}" data-menu-id="{{$item->menu_id}}" data-url="{{$item->url}}" data-external="{{ ($item->external == 1) ? 'true' : 'false'}}">
                                        <td>::</td>
                                        <td class="title">{{$item->title}}</td>
                                        <td class="action">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-default" data-toggle="modal" data-id="{{$item->id}}" data-target="#modal-menu-item"><i class="fa fa-pencil"></i></a>
                                                <a data-id="{{$item->id}}" class="btn btn-danger btn-destroy"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    <div class="add-menu-item">
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-menu-item">Thêm</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{url('admin/menus')}}" class="btn btn-default">Quay lại</a>
            <button type="submit" class="btn btn-info pull-right">Lưu</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
<div class="modal fade" id="modal-menu-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="" class="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Item</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="item-id" value="">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control item-title" required placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="title" class="w100"><span>Liên kết</span><span class="openOverlay flright">Chọn</span></label>
                        <input type="text" class="form-control item-url" required placeholder="Liên kết">
                        <div class="overlay-group">
                            <div class="group">
                                <div class="item" data-url="{{url('/')}}"><i class="fa fa-home"></i> Trang chủ</div>
                                <div class="item article-category"><i class="fa fa-book"></i>Danh mục bài viết</div>
                                <div class="item articles"><i class="fa fa-file-text"></i>Bài viết</div>
                                <div class="item product-category"><i class="fa fa-tags"></i>Danh mục sản phẩm</div>
                                <div class="item products"><i class="fa fa-tag"></i>Sản phẩm</div>
                                <div class="item pages"><i class="fa fa-file"></i>Trang</div>
                            </div>
                            <div class="child"></div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="item-external" value="1"> Mở trong tab mới
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary btn-save">Cập nhật</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('footerScript')
<script>
    $( document ).ready(function() {
        $( ".sortable" ).sortable({
            update: function( event, ui ) {
                updatePosition()
            }
        });
        $('body').on('click','.menuItems .action .btn-destroy',function(){
            var destroyIDList = $('.menu_items_destroy').val() != '' ? ($('.menu_items_destroy').val()).split(',') : []
            destroyIDList.push($(this).attr('data-id'))
            $('.menu_items_destroy').val(destroyIDList.toString())
            $(this).closest('.item').remove()
            updatePosition()
        })
        $('#modal-menu-item').on('show.bs.modal', function (e) {
            $(this).find('input').removeClass('has-error')

            var button = $(e.relatedTarget)
            
            var id = button.closest('.item').attr('data-id')
            var title = button.closest('.item').find('.title').text()
            var url = button.closest('.item').attr('data-url')
            var external = button.closest('.item').attr('data-external')
            
            $('#modal-menu-item .item-id').val(id)
            $('#modal-menu-item .item-title').val(title)
            $('#modal-menu-item .item-url').val(url)
            $('#modal-menu-item .item-external').prop('checked', (external == 'true'))
        })
        $('body').on('click','#modal-menu-item .group .item',async function(){
            var html = ''
            if($(this).hasClass('article-category')){
                var categories = await $.ajax({ url: "{{url('admin/categories/all?type=0')}}" });
                html += '<div class="item" data-url="{{url('tin-tuc/')}}">Tất cả</div>'
                categories.forEach((category) => {
                    html += `
                    <div class="item" data-url="{{url('danh-muc/`+category.slug+`')}}">`+category.title+`</div>
                    `
                })
            }
            if($(this).hasClass('articles')){
                var articles = await $.ajax({ url: "{{url('admin/articles/all')}}" });
                articles.forEach((article) => {
                    html += `
                    <div class="item" data-url="{{url('tin-tuc/`+article.slug+`')}}">`+article.title+`</div>
                    `
                })
            }
            if($(this).hasClass('product-category')){
                var categories = await $.ajax({ url: "{{url('admin/categories/all?type=1')}}" });
                html += '<div class="item" data-url="{{url('danh-muc/san-pham')}}">Tất cả</div>'
                categories.forEach((category) => {
                    html += `
                    <div class="item" data-url="{{url('danh-muc/`+category.slug+`')}}">`+category.title+`</div>
                    `
                })
            }
            if($(this).hasClass('products')){
                var products = await $.ajax({ url: "{{url('admin/products/all')}}" });
                products.forEach((product) => {
                    html += `
                    <div class="item" data-url="{{url('san-pham/`+product.slug+`')}}">`+product.title+`</div>
                    `
                })
            }
            if($(this).hasClass('pages')){
                var pages = await $.ajax({ url: "{{url('admin/pages/all')}}" });
                pages.forEach((page) => {
                    html += `
                    <div class="item" data-url="{{url('/`+page.slug+`')}}">`+page.title+`</div>
                    `
                })
            }
            $('#modal-menu-item .overlay-group .child').empty().append(html)
            $('#modal-menu-item .overlay-group .group').removeClass('active')
            $('#modal-menu-item .overlay-group .child').addClass('active')
        })
        $('body').on('click','#modal-menu-item .item',function(){
            var url = $(this).attr('data-url')
            if (typeof url !== typeof undefined && url !== false) {
                $('#modal-menu-item input.item-url').val(url)
                $('#modal-menu-item .overlay-group > *').removeClass('active')
            }
        })
        $('body').on('click','#modal-menu-item .btn-save',function(){
            var id = $('#modal-menu-item').find('.item-id').val()
            var title = $('#modal-menu-item').find('.item-title').val()
            var url = $('#modal-menu-item').find('.item-url').val()
            var external = $('#modal-menu-item').find('.item-external')[0].checked
            if(title == ''){
                $('#modal-menu-item').find('.item-title').addClass('has-error')
                return false
            }
            if(url == ''){
                $('#modal-menu-item').find('.item-url').addClass('has-error')
                return false
            }
            if(id){
                var item = $('.menuItems .item[data-id="'+id+'"]')
                item.attr('data-url',url)
                item.attr('data-external',external)
                item.find('.title').text(title)
            }else{
                var html = `
                <tr class="item ui-sortable-handle" data-id data-menu-id="{{isset($menu->id) ? $menu->id : ''}}" data-url="`+url+`" data-external="`+external+`">
                    <td>::</td>
                    <td class="title">`+title+`</td>
                    <td class="action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-menu-item"><i class="fa fa-pencil"></i></a>
                            <a data-id class="btn btn-danger btn-destroy"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                `
                $('.menuItems tbody').append(html)
                
            }
            $('#modal-menu-item').modal('hide')
            updatePosition()
        })
        $('body').on('click','#modal-menu-item .openOverlay',function(){
            $(this).closest('.form-group').find('.overlay-group .group').addClass('active')
        })
    });
    function updatePosition(){
        var listItems = []
        $('.menuItems .item').each(function(index,item){
            listItems.push({
                id: $(item).attr('data-id'),
                menu_id : $(item).attr('data-menu-id'),
                title : $(item).find('.title').text(),
                url : $(item).attr('data-url'),
                position : index ,
                external : $(item).attr('data-external')=='true' ? 1 : 0
            })
        })
        $('.menu_items_json').val(JSON.stringify(listItems));
    }
</script>
@endsection