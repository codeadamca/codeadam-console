@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Assignment'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Assignments' => '/assignments/list'], 'title' => 'Add Assignment'])

    <form method="post" action="/assignments/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'github_id', 'label' => 'GitHub ID'])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Related Topics', 'options' => $assignment_topics, 'type' => 'multiple'])

        @include ('layout.forms.button', ['label' => 'Add Assignment'])

    </form>

</section>

@endsection
