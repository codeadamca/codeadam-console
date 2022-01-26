@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Article Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list', 'Manage Article Types' => '/articles/types/list'], 'title' => 'Add Article Type'])

    <form method="post" action="/articles/types/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.button', ['label' => 'Add Article Type'])

    </form>

</section>

@endsection
