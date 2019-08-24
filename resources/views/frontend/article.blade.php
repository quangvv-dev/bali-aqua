@extends('layouts.frontend')

<!-- SEO -->
@section('title', isset($article) ? $article->title : '')
@section('meta-title')
@if(isset($article))
{{$article->metatitle}}
@endif
@endsection
@section('meta-description')
@if(isset($article))
{{$article->metadescription}}
@endif
@endsection

@section('content')
<section class="section1_newsdetail section-top">
    <div class="container">
        <div class="text-w">
            <h2 class="title-main">{{$article->title}}</h2>
            <div class="date"><span>{{$article->updated_at}}</span></div>
        </div>
        <div class="content-w">
            <div class="thumnail">
                <img src="{{$article->image}}" alt="{{$article->slug}}">
            </div>
            <div class="content">
                <div class="detail">
                    {!!$article->content!!}
                </div>
                <div class="share">
                    <p>Chia sẻ bài viết</p>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/tin-tuc/'.$article->slug)}}"
                   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                   target="_blank" title="Share on Facebook">
                    <img src="{{url('/images/site/share_fb.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>
<!-- end-section -->
@include('frontend.partials.related-articles')
@endsection