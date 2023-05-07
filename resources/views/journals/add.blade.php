@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Article'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list'], 'title' => 'Add Article'])

    <form method="post" action="/journals/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'name'])

        @include ('layout.forms.textarea', ['name' => 'description'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date'])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Related Topics', 'options' => $journal_topics, 'type' => 'multiple'])

        @include ('layout.forms.button', ['label' => 'Add Journal'])

    </form>

</section>

@endsection
