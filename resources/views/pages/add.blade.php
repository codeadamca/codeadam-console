@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Page'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Pages' => '/pages/list'], 'title' => 'Add Page'])

    <form method="post" action="/pages/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'slug'])

        @include ('layout.forms.textarea', ['name' => 'content'])

        @include ('layout.forms.text', ['name' => 'tinkercad_id', 'label' => 'Tinkercad ID'])

        @include ('layout.forms.text', ['name' => 'arduino_id', 'label' => 'Arduino ID'])

        @include ('layout.forms.text', ['name' => 'github_id', 'label' => 'GitHub ID'])

        @include ('layout.forms.text', ['name' => 'youtube_id', 'label' => 'YouTube ID'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date'])

        @include ('layout.forms.select', ['name' => 'topic_id', 'label' => 'Primary Topic', 'options' => $page_topics, 'type' => 'table'])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Other Related Topics', 'options' => $page_topics, 'type' => 'multiple'])

        @include ('layout.forms.button', ['label' => 'Add Article'])

    </form>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</section>

@endsection
