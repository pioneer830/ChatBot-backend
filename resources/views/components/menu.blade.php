@php
    $id = str_replace(" ","_",$label);
    $is_lock_show = $is_lock_show ?? false;
@endphp
<li id="{{$id."-area"}}" class="nav-item menu-items">
    <a class="nav-link" href="{{$route}}">
              <span class="menu-icon">
                {{$menu_icon}}
              </span>
        <span class="menu-title">{{$label}}</span>
    </a>
    @if($is_lock_show && !isAllowPermission($id))
        @component('components.lock')
            @slot('label')
                {{$label}}
            @endslot
            @slot('width')
                25px;
            @endslot
        @endcomponent
    @endif
</li>
{{--<li id="{{$id."-area"}}">
    <a href="{{$route}}"
       class="flex items-center p-2 text-base font-normal text-gray-200 rounded-lg dark:text-white hover:bg-gray-800">
        {{$menu_icon}}
        <span class="ml-3">{{$label}}</span>
    </a>
    <a class="" href="{{$route}}">
        {{$menu_icon}}
        {{$label}}
    </a>
    @if($is_lock_show && !isAllowPermission($id))
        @component('components.lock')
            @slot('label')
                {{$label}}
            @endslot
            @slot('mouseover')
                {{$id."-area"}}
            @endslot
            @slot('left')
                165px
            @endslot
            @slot('top')
                -32px
            @endslot
            @slot('width')
                25px;
            @endslot
        @endcomponent
    @endif
</li>--}}



