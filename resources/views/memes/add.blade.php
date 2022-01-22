@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Meme'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list'], 'title' => 'Add Meme'])

    <form method="post" action="/memes/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required class="w3-input w3-border">
            
            @error ('title')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="tag_id">Tags:</label>
            <select name="tag_id[]" id="tag_id" required multiple size="7" class="w3-input w3-border">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        {{(is_array(old('tag_id')) && in_array($tag->id,old('tag_id'))) ? 'selected' : ''}}>
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
            @error ('tag_id')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-green">Add Meme</button>
        </div>

    </form>

</section>

@endsection
