@php
$relatedArticles = Helper::getRelatedArticle($article->id);
@endphp
<section class="section2_news">
    <div class="container">
        <h3 class="title">Bài viết cùng chủ đề</h3>
        <div class="article-relate article-w">
            @isset($relatedArticles)
                @foreach ($relatedArticles as $article)
                    <div class="col-md-4 col-sm-6 item">
                        <a href="{{url('/tin-tuc/'.$article->slug)}}">
                            <img class="cover" src="{{$article->image}}" alt="">
                        </a>
                                                    
                        <div class="wrap-content">
                            <a class="name" href="{{url('/tin-tuc/'.$article->slug)}}">{{Helper::truncate($article['title'],80)}}</a>
                            <div class="date">{{$article['updated_at']}}</div>
                        </div>
                    </div>
                @endforeach
            @endisset                   
    </div>
</section>
<div class="clear"></div>