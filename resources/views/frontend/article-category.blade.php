@extends('layouts.frontend')

<!-- SEO -->
@section('title', 'Tin tức')
@section('meta-title')

@endsection
@section('meta-description')

@endsection


@section('content')
<section class="section2_news row">
    <div class="container">
        <div class="block2 article-w">
            <div class="title-tab">
                <a href="#" class="active">Tin tức</a>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 col-sm-6 item">
                            <a href="{{url('tin-tuc/'.$article->slug)}}">
                                <img class="cover"
                                    src="{{(isset($article->image) && $article->image!='') ? url($article->image) : url('/images/product/noimage.png')}}"
                                    alt="">
                            </a>
                            <div class="wrap-content">
                                <a class="name" href="{{url('tin-tuc/'.$article->slug)}}">{{Helper::truncate($article['title'],80)}}</a>
                                <div class="date">{{$article['updated_at']}}</div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="paginate">
            {{ $articles->links() }}
            {{-- <ul class="pagination"><li class="active"><a>1</a></li><li><a href="2/index.html">2</a></li><li><a href="3/index.html">3</a></li><li><a href="4/index.html">4</a></li><li><a href="2/index.html">Tiếp theo</a></li><li><a href="4/index.html">Cuối cùng</a></li></ul>                </div> --}}
        </div>
</section>
<div class="clear"></div>
@endsection