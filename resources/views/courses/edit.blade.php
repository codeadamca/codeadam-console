@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Course'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Courses' => '/courses/list'], 'title' => 'Edit Course: '.$course->name])

    <form method="post" action="/courses/edit/{{$course->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @csrf

        @include ('layout.forms.text', ['name' => 'name', 'value' => $course->name])

        @include ('layout.forms.text', ['name' => 'code', 'value' => $course->code])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL', 'value' => $course->url])

        @include ('layout.forms.text', ['name' => 'description', 'value' => $course->description])

        @include ('layout.forms.button', ['label' => 'Edit Course'])

    </form>

</section>

@endsection
