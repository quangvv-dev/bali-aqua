@php
$galleries = Helper::getGalleries();
@endphp
<section class="gallery-productlisting">
    <div class="container">
        <div class="gallery-w hidden-xs">
            <div class="gallery">
                <div class="caption-box">
                    <a href="{{$settings->url_gallery_box}}"><span class="h-cap">{{$settings->caption_gallery_box}}</span></a>
                </div>
                @isset($galleries)
                @foreach ($galleries as $k => $item)
                    <div class="item p{{$k+1}}">
                        <a href="{{$item->url}}" rel=""><img
                                src="{{url($item->image)}}"
                                alt="">
                            <h4 class="h4-caption">{{$item->caption}}</h4>
                        </a>
                    </div>
                @endforeach
                @endisset
            </div>
        </div>

        <!-- mobile -->
        <div class="gallery-mobile-w  hidden-sm hidden-md hidden-lg">
            <h2 class="title-main">{{$settings->caption_gallery_box}}</h2>
            <div class="gallery-mobile">
                @isset($galleries)
                @foreach ($galleries as $k => $item)
                    <div class="item">
                        <a href="{{$item->url}}"><img
                                src="{{url($item->image)}}"
                                alt="">
                            <h4 class="h4-caption">{{$item->caption}}</h4>
                        </a>
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</section>