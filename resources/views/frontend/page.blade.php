@extends('layouts.frontend')

<!-- SEO -->
@section('title', isset($page) ? $page->title : '')
@section('meta-title')
@if(isset($page))
{{$page->metatitle}}
@endif
@endsection
@section('meta-description')
@if(isset($page))
{{$page->metadescription}}
@endif
@endsection

@section('content')
<section class="section1_ab2 section-top banner">
    <div class="text-w">
        {{-- <h2 class="title-main white">{{$page->title}}</h2> --}}
    <h2 class="title-main">{{$page->title}}</h2>
    </div>
</section>
<div class="clear"></div>
<section class="section2_ab2">
    <div class="container">
        {!!$page->content!!}
</section>
@endsection