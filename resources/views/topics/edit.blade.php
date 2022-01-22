@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Topic'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Topics' => '/topics/list'], 'title' => 'Edit Topic: '.$topic->title])

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
