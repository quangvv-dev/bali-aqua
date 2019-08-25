<!-- Sidebar -->
<div class="sidebar nav-mobile hidden-sm hidden-md hidden-lg">
    @php
        $menu = \App\Helpers\Helper::getMenu('main-menu');
    @endphp
    @if($menu)
        @php
            $isMeetMiddle = false;
            $isActive = '';
            $middle = count($menu->items)/2;
        @endphp
        <ul class="main-menu">
            @for ($k = 0 ; $k < count($menu->items); $k++)
                @php
                    $item = $menu->items[$k];
                    $isActive = (Request::fullUrl() == $item['url']) ? 'active' : '';
                    if ($k == $middle && !$isMeetMiddle){
                        $k = $k - 1;
                        $isMeetMiddle = true;
                        continue;
                    }
                @endphp
                <li class={{$isActive}}><a @if($item['external']) target="_blank" @endif href="{{$item['url']}}">{{$item['title']}}</a></li>
            @endfor
@endif
        </ul>
    <div class="hotline">
        <a href="tel:{{$settings->hotline}}}">{{$settings->hotline}}</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
