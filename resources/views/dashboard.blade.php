@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    <div class="w3-row-padding">

        @foreach ($links as $link)
            
            <div class="w3-quarter">
                <div class="w3-card w3-container w3-orange w3-margin-bottom w3-center w3-padding-32">
                    <a href="{{$link['route']}}">
                        <i class="{{$link['icon']}} fa-3x"></i>
                        <br>
                        {{$link['text']}}
                    </a>
                </div>
            </div>

        @endforeach
        
    </div>

</section>

@endsection
