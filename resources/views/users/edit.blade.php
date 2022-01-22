@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit User'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Users' => '/users/list'], 'title' => 'Edit User: '.$user->first.' '.$user->last])

    <form method="post" action="/users/edit/{{$user->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'first', 'label' => 'First Name', 'value' => $user->first])

        @include ('layout.forms.text', ['name' => 'last', 'label' => 'Last Name', 'value' => $user->last])

        @include ('layout.forms.text', ['name' => 'email', 'value' => $user->email, 'type' => 'eamil'])

        @include ('layout.forms.text', ['name' => 'password', 'type' => 'password'])

        @include ('layout.forms.button', ['label' => 'Edit User'])

    </form>

</section>

@endsection
