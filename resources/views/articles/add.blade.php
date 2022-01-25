@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Article'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list'], 'title' => 'Add Article'])

    <form method="post" action="/articles/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.textarea', ['name' => 'content'])

        @include ('layout.forms.text', ['name' => 'instagram_id', 'label' => 'Instagram ID'])

        @include ('layout.forms.text', ['name' => 'twitter_id', 'label' => 'Twitter ID'])

        @include ('layout.forms.text', ['name' => 'soundcloud_id', 'label' => 'Soundcloud ID'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date'])

        @include ('layout.forms.select', ['name' => 'home', 'label' => 'Display on Home Page', 'options' => $homes])

        @include ('layout.forms.textarea', ['name' => 'resources'])

        @include ('layout.forms.select', ['name' => 'article_type_id', 'label' => 'Type', 'options' => $article_types, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Article'])

    </form>

</section>

@endsection
