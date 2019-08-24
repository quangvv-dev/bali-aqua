@extends('layouts.frontend')

@section('title', isset($product) ? $product->title : '')
@section('meta-title')
@if(isset($product))
{{$product->metatitle}}
@endif
@endsection
@section('meta-description')
@if(isset($product))
{{$product->metadescription}}
@endif
@endsection

@section('content')

<!-- Chinh Sach(policy ) -->
@include('frontend.partials.features')
<div id="secondary" class="col-sm-5 col-md-3">
@include('frontend.partials.left-sidebar')
</div><!-- #secondary -->
<section id="primary" class="content-area col-sm-7 col-md-9 wrap-page">
    <main id="main" class="site-main" role="main">
        @include('frontend.partials.product')
    </main><!-- #main -->

</section><!-- #primary -->
@endsection