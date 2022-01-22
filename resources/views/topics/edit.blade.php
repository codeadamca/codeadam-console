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

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $topic->title])

        @include ('layout.forms.text', ['name' => 'url', 'value' => $topic->url, 'label' => 'URL'])
        
        @include ('layout.forms.text', ['name' => 'slug', 'value' => $topic->slug])

        @include ('layout.forms.text', ['name' => 'icon', 'value' => $topic->icon, 'label' => 'Font Awesome Icon'])
        
        @include ('layout.forms.select', ['name' => 'teaching', 'label' => 'Display on Teaching Page', 'options' => $teachings, 'value' => $topic->teaching])

        @include ('layout.forms.select', ['name' => 'background', 'label' => 'Banner Background', 'options' => $backgrounds, 'value' => $topic->background])

        @include ('layout.forms.button', ['label' => 'Edit Topic'])

    </form>

</section>

@endsection
