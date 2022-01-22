@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Evaluation'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Evalutions' => '/evaluations/list'], 'title' => 'Add Evaluation'])

    <form method="post" action="/evaluations/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.textarea', ['name' => 'content'])

        @include ('layout.forms.button', ['label' => 'Add Evaluation'])

    </form>

</section>

@endsection
