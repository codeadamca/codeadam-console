@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <h2 class="w3-text-orange w3-center">Add Meme</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/memes/list">Manage Memes</a> / 
        Add Meme
    </div>

    <form method="post" action="/memes/add" novalidate class="w3-margin-bottom">

        {{csrf_field()}}

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required class="w3-input w3-border">
            
            @if ($errors->first('title'))
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
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
            @if ($errors->first('tag_id'))
                <span class="w3-text-red">{{$errors->first('tag_id')}}</span>
            @endif
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-green">Add Meme</button>
        </div>

    </form>

</section>

@endsection
