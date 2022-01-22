
<div class="w3-text-grey w3-small w3-margin-bottom">
    <a href="/dashboard">Dashboard</a> / 
    @foreach ($links ?? array() as $text => $link)
        <a href="{{$link}}">{{$text}}</a> / 
    @endforeach
    {{$title}}
</div>