@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Assignment'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Assignments' => '/assignments/list'], 'title' => 'Edit Assignment: '.$assignment->title])

    <form method="post" action="/assignments/edit/{{$assignment->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $assignment->title])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL', 'value' => $assignment->url])

        @include ('layout.forms.text', ['name' => 'github_id', 'label' => 'GitHub ID', 'value' => $assignment->github_id])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Related Topics', 'options' => $assignment_topics, 'type' => 'multiple', 'selected' => $assignment->manyTopics()->pluck('topic_id')->toArray()])

        @include ('layout.forms.button', ['label' => 'Edit Assignment'])

    </form>

</section>

@endsection
