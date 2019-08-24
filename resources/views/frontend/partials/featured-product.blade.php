@php
    $limit_product = isset($settings->limit_product) && $settings->limit_product >= 0 ? $settings->limit_product : 4;
    $featuredProducts = Helper::getFeaturedProducts($limit_product);
@endphp
<section class="section3_home">
    <div class="container">
        <div class="slider-product-listing" id="slider1_product">
            @isset($featuredProducts)
                @foreach ($featuredProducts as $k => $product)
                    @php
                        $images = json_decode($product['images']);
                    @endphp
                    <div class="item">
                        <div class="img-w">
                            @if(isset($images[0]))
                                <img src="{{url($images[0]->url)}}" alt="{{$product['title']}}"
                                     alt="{{$images[0]->alt}}">
                            @else
                                <img src="{{url('/images/product/noimage.png')}}" alt="{{$product['title']}}"
                                     class="">
                            @endif
                        </div>
                        <div class="des">{{Helper::truncate($product->description,70)}}</div>
                        <h3 class="name-2">{{$product->title}}</h3>
                        <span class="money">{{(isset($product['price']) && $product['price']!= 0) ? number_format($product['price'], 0, '', ',').'đ' : ''}}</span>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
    <div class="viewmore-box">
        <a href="{{url('danh-muc/san-pham')}}">Xem thêm</a>
    </div>
    <div class="title-opacity">Untouched water</div>
</section>
<div class="clear"></div>
