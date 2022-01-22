@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <h2 class="w3-text-orange w3-center">Edit Topic</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/topics/list">Manage Topics</a> / 
        Edit Topic: {{$topic->title}}
    </div>

    <form method="post" action="/topics/edit/{{$topic->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        <?= csrf_field() ?>

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $topic->title)}}" required class="w3-input w3-border">
            
            @error ('title')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>
        
        <div class="w3-margin-bottom">
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" value="{{old('url', $topic->url)}}" required class="w3-input w3-border">
            
            @error ('url')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{old('slug', $topic->slug)}}" required class="w3-input w3-border">
            
            @error ('slug')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="icon">
                <a href="https://fontawesome.com/v5.15/icons"><i class="fab fa-font-awesome"></i></a>
                Font Awesome Icon:
            </label>
            <input type="text" name="icon" id="icon" value="{{old('icon', $topic->icon)}}" required class="w3-input w3-border">
            
            @error ('icon')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="teaching">Display on Teaching Page:</label>
            <select name="teaching" id="teaching" required class="w3-input w3-border">
                @foreach ($teachings as $teaching)
                    <option value="{{$teaching}}"
                        {{$teaching == old('teaching', $topic->teaching) ? 'selected' : ''}}>
                        {{$teaching}}
                    </option>
                @endforeach
            </select>

            @error ('teaching')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="background">Background for Pages:</label>
            <select name="background" id="background" required class="w3-input w3-border">
                @foreach ($backgrounds as $background)
                    <option value="{{$background}}"
                        {{$background == old('background', $topic->background) ? 'selected' : ''}}>
                        {{$background}}
                    </option>
                @endforeach
            </select>

            @error ('teaching')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>


        <div class="w3-center">
            <button type="submit" class="w3-button w3-orange">Edit Topic</button>
        </div>

    </form>

</section>

@endsection
