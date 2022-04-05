@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Assignment'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Assignments' => '/assignments/list'], 'title' => 'Add Assignment'])

    <form method="post" action="/assignments/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'url'])

        @include ('layout.forms.text', ['name' => 'github_id'])

        @include ('layout.forms.button', ['label' => 'Add Assignment'])

    </form>

</section>

@endsection
