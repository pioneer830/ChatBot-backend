@php
$text_position = (int)str_replace("px","",$width) + 5;
@endphp

<div class="lock-img-area">
    <div class="lock-div">
        <img class="lock-icon-img" style="width: 25px;height: 25px; {{isset($top) ? 'top:'.$top.';' :""}} {{isset($left) ? 'left:'.$left.';' :""}}"
             src="{{asset('/assets/images/lock.png')}}" width="16" height="11" alt="img"/>
        <p class="hide" style="{{isset($top) ? 'top:'.$top.';' :""}} {{isset($left) ? 'left:'.(str_replace("px","",$left) + 30)."px".';' :""}}">{{getPermissionMessage($label)}}</p>
    </div>
</div>





