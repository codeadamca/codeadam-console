@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Meme'])

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/memes/list">Manage Memes</a> / 
        Edit Meme: {{$meme->title}}
    </div>

    <form method="post" action="/memes/edit/{{$meme->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $meme->title)}}" required class="w3-input w3-border">
            
            @error ('title')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>
        
        <div class="w3-margin-bottom">
            <label for="tag_id">Tags:</label>
            <select name="tag_id[]" id="tag_id" required multiple size="7" class="w3-input w3-border">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        {{(is_array(old('tag_id', $meme->tags()->pluck('tag_id')->toArray())) && in_array($tag->id,old('tag_id', $meme->tags()->pluck('tag_id')->toArray()))) ? 'selected' : ''}}>
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
            @error ('tag_id')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-orange">Edit Meme</button>
        </div>

    </form>

</section>

@endsection
