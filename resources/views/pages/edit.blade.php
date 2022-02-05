@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Page'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Pages' => '/pages/list'], 'title' => 'Edit Page: '.$page->title])

    <form method="post" action="/pages/edit/{{$page->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $page->title])

        @include ('layout.forms.text', ['name' => 'slug', 'value' => $page->slug])

        @include ('layout.forms.textarea', ['name' => 'content', 'value' => $page->content])

        @include ('layout.forms.text', ['name' => 'tinkercad_id', 'value' => $page->tinkercad_id, 'label' => 'Tinkercad ID'])

        @include ('layout.forms.text', ['name' => 'arduino_id', 'value' => $page->arduino_id, 'label' => 'Arduino ID'])

        @include ('layout.forms.text', ['name' => 'github_id', 'value' => $page->github_id, 'label' => 'GitHub ID'])

        @include ('layout.forms.text', ['name' => 'youtube_id', 'value' => $page->youtube_id, 'label' => 'YouTube ID'])
        
        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date', 'value' => $page->published_at])

        @include ('layout.forms.select', ['name' => 'topic_id', 'label' => 'Primary Topic', 'options' => $page_topics, 'type' => 'table', 'selected' => $page->topic_id])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Other Related Topics', 'options' => $page_topics, 'type' => 'multiple', 'selected' => $page->manyTopics()->pluck('topic_id')->toArray()])

        @include ('layout.forms.button', ['label' => 'Edit Page'])

    </form>

</section>

@endsection
