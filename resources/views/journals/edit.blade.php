@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Article'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list'], 'title' => 'Edit Article: '.$article->title])

    <form method="post" action="/articles/edit/{{$article->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $article->title])

        @include ('layout.forms.textarea', ['name' => 'content', 'value' => $article->content])

        @include ('layout.forms.text', ['name' => 'instagram_id', 'value' => $article->instagram_id, 'label' => 'Instagram ID'])

        @include ('layout.forms.text', ['name' => 'twitter_id', 'value' => $article->twitter_id, 'label' => 'Twitter ID'])

        @include ('layout.forms.text', ['name' => 'soundcloud_id', 'value' => $article->soundcloud_id, 'label' => 'Soundcloud ID'])

        @include ('layout.forms.text', ['name' => 'url', 'value' => $article->url, 'label' => 'URL'])
        
        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date', 'value' => $article->published_at])
        
        @include ('layout.forms.select', ['name' => 'home', 'label' => 'Display on Home Page', 'options' => $homes, 'selected' => $article->home])

        @include ('layout.forms.textarea', ['name' => 'resources', 'value' => $article->resources])

        @include ('layout.forms.select', ['name' => 'article_type_id', 'label' => 'Type', 'options' => $article_types, 'type' => 'table', 'selected' => $article->article_type_id])

        @include ('layout.forms.button', ['label' => 'Edit Article'])

    </form>

</section>

@endsection
