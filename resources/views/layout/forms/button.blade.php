
<div class="w3-center">

    @if (isset($href))

        <a href="{{$href}}" class="w3-button w3-orange">{{$label}}</a>

    @else

        <button type="{{$type ?? 'submit'}}" class="w3-button w3-orange">{{$label}}</button>

    @endif


</div>
