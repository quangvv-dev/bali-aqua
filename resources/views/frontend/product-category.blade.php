@extends('layouts.frontend')

<!-- SEO -->
@section('title', isset($mainCate) ? $mainCate->title : 'Danh mục sản phẩm')
@section('meta-title')
@if(isset($mainCate))
{{$mainCate->metatitle}}
@endif
@endsection
@section('meta-description')
@if(isset($mainCate))
{{$mainCate->metadescription}}
@endif
@endsection

@section('content')
@isset($categories)
    @foreach ($categories as $k => $category)
        @php
            $topClass = $k==0 ? 'section-top' : '';
            $products = $category->allProducts();
        @endphp
        <section class="section{{$k+1}}_prolist {{$topClass}}">
            <div class="container">
                <h2 class="title-main">{{$category->title}}</h2>
                <div class="slider-product-listing" id="slider{{$k+1}}_product">
                @isset($products)
                    @foreach ($products as $product)
                    @php
                    $images = json_decode($product['images']);
                    @endphp
                    <div class="item">
                        <div class="img-w" style="width: 100%; height:100%">
                                @if(isset($images[0]))
                                <img src="{{url($images[0]->url)}}" alt="{{$product['title']}}" alt="{{$images[0]->alt}}" style="padding-top:20px;">
                                @else
                                <img src="{{url('/images/site/vh_01.png')}}" alt="{{$product['title']}}"
                                    class="" style="padding-top:20px;">
                                @endif
                        </div>
                        <div class="des">{{ Helper::truncate($product['description'],100) }}</div>
                        <p class="ml">{{$product['the_tich']}}</p>
                        <h3 class="name">{{$product['title']}}</h3>
                        <span class="money">{{(isset($product['price']) && $product['price']!= 0) ? number_format($product['price'], 0, '', ',').'đ' : ''}}</span>
                    </div>
                    @endforeach
                @endisset
                                                                        
            </div>
            <div class="title-opacity">Untouched water</div>
        </section>
        <div class="clear"></div>
    @endforeach
@endisset
@endsection
