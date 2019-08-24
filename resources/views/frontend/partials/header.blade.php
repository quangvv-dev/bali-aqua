<header class="header-main ">
    <div class="top-nav">
        <div class="btn-nav hidden-sm hidden-md hidden-lg">
            <div class="o-grid__item">
                <button class="c-hamburger c-hamburger--htx">
                    <span>toggle menu</span>
                </button>
            </div>
        </div>
        <a class="call-right" href="tel:{{$settings->hotline}}}">
            <div class="call">
                <span>Gọi nước bình 20 lít <i class="fa fa-caret-right" aria-hidden="true"></i></span>
                <img alt="{{$settings->alt_banner}}" src="{{url($settings->banner)}}">
            </div>
            <div class="close-map">
                <span class="text">Đóng bản đồ</span>
                <div class="btn-close-map">
                    <div class="o-grid__item">
                        <button class="c-hamburger c-hamburger--htx is-active">
                            <span>toggle menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </a>
        <div class="hotline">
            <span>Hotline</span>
            <a href="tel:{{$settings->hotline}}}">{{$settings->hotline}}</a>
        </div>
        {{-- <div class="line"></div> --}}
    </div>

    <div class="navigation">
        @php
        $menu = Helper::getMenu('main-menu');
        @endphp
        @isset($menu)
        @php
            $isMeetMiddle = false;
            $isActive = '';
            $middle = count($menu->items)/2;
        @endphp
            <ul>
                @for ($k = 0 ; $k < count($menu->items); $k++)
                @php
                    $item = $menu->items[$k];
                    $isActive = (Request::fullUrl() == $item['url']) ? 'active' : '';
                    if ($k == $middle && !$isMeetMiddle){
                        echo '<li class="logo"><a href="'.url("/").'" class="a-logo"><img alt="'.$settings->alt_logo.'" src="'.url($settings->logo).'"></a></li>';
                        $k = $k - 1;
                        $isMeetMiddle = true;
                        continue;
                    }
                @endphp
                <li class={{$isActive}}><a @if($item['external']) target="_blank" @endif href="{{$item['url']}}">{{$item['title']}}</a></li>
                @endfor
                
            </ul>
            <div class="logo-mobile hidden-sm hidden-md hidden-lg">
                <a href="{{url('/')}}"><img alt="'.$settings->alt_logo.'" src="{{url($settings->logo)}}"></a>
            </div>
        @endisset
        
    </div>
</header>