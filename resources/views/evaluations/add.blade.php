@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <h2 class="w3-text-orange w3-center">Add Evaluation</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/evaluations/list">Manage Evaluations</a> / 
        Add Evaluation
    </div>

    <form method="post" action="/evaluations/add" novalidate class="w3-margin-bottom" autocomplete="off">

        {{csrf_field()}}

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required class="w3-input w3-border">
            
            @error ('title')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea name="content" id="content" required class="w3-input w3-border">{{old('content')}}</textarea>
            
            @error ('content')
                <small class="w3-text-red">{{$message}}</small>
            @enderror
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-green">Add Evaluation</button>
        </div>

    </form>

</section>

@endsection
