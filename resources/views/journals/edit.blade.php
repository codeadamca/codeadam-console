@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Journal'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Journals' => '/journals/list'], 'title' => 'Edit Journal: '.$journal->title])

    <form method="post" action="/journals/edit/{{$journal->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'name', 'value' => $journal->name])

        @include ('layout.forms.textarea', ['name' => 'description', 'value' => $journal->description])

        @include ('layout.forms.text', ['name' => 'url', 'value' => $journal->url, 'label' => 'URL'])
        
        @include ('layout.forms.text', ['name' => 'published_at', 'label' => 'Date', 'type' => 'date', 'value' => $journal->published_at])
        
        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Related Topics', 'options' => $journal_topics, 'type' => 'multiple', 'selected' => $journal->manyTopics()->pluck('topic_id')->toArray()])

        @include ('layout.forms.button', ['label' => 'Edit Journal'])

    </form>

</section>

@endsection
