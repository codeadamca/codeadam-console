@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add User'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Users' => '/users/list'], 'title' => 'Add User'])

    <form method="post" action="/users/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'first', 'label' => 'First Name'])

        @include ('layout.forms.text', ['name' => 'last', 'label' => 'Last Name'])

        @include ('layout.forms.text', ['name' => 'email', 'type' => 'email'])

        @include ('layout.forms.text', ['name' => 'password', 'type' => 'password'])

        @include ('layout.forms.button', ['label' => 'Add User'])

    </form>

</section>

@endsection
