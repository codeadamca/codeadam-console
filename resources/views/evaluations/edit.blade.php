@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Evaluation'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Evalutions' => '/evaluations/list'], 'title' => 'Edit Evaluation: '.$evaluation->title])

    <form method="post" action="/evaluations/edit/{{$evaluation->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $evaluation->title)}}" required class="w3-input w3-border">
            
            @error ('title')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea type="text" name="content" id="content" required class="w3-input w3-border">{{old('content', $evaluation->content)}}</textarea>
            
            @error ('content')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-orange">Edit Evaluation</button>
        </div>

    </form>

</section>

@endsection
