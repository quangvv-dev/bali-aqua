@php
    $slider = Helper::getSlide(false);
@endphp
@if(isset($slider))
<section class="section1_home">
    <div class="slider-home">
        @foreach($slider as $item)
        <div class="item slide--has-caption">
            <a href="{{$item->url}}">
                    <img src="{{url($item->image)}}" alt="">
            </a>
            {{-- <div class="slide-caption  ">
                <h3 class="title-1">quyền năng của khoáng</h3>
                <h4 class="title-2">cho sức khỏe và vẻ đẹp</h4>
                <div class="text hidden-xs"></div>
                <div class="btn-primary"><a href="cau-chuyen-vinh-hao.html">Câu chuyện Vĩnh Hảo</a></div>
            </div> --}}
        </div>
        @endforeach
    </div>
</section>
<div class="clear"></div>
@endif