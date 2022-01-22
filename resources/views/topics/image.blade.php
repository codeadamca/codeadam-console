@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <h2 class="w3-text-orange w3-center">Topic Image</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/topics/list">Manage Topics</a> / 
        Topic Image: {{$topic->title}}
    </div>

    @if ($topic->image)
        <div class="w3-center w3-light-grey w3-padding w3-border w3-margin-bottom">
            <img src="{{asset('storage/'.$topic->image)}}" width="400">
        </div>
    @endif

    <form method="post" action="/topics/image/{{$topic->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        <div class="w3-margin-bottom">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}" required class="w3-input w3-border">
            
            @error ('image')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-orange">Add Image</button>
        </div>

    </form>

</section>

@endsection
