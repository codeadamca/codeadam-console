@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Course'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Courses' => '/courses/list'],  'title' => 'Add Course'])

    <form method="post" action="/courses/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'name'])

        @include ('layout.forms.text', ['name' => 'code'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'description'])

        @include ('layout.forms.select', ['name' => 'topics', 'label' => 'Related Topics', 'options' => $course_topics, 'type' => 'multiple'])

        @include ('layout.forms.button', ['label' => 'Add Course'])

    </form>

</section>

@endsection
