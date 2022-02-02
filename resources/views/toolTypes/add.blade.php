@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Tool Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Tools' => '/tools/list', 'Manage Tool Types' => '/tools/types/list'], 'title' => 'Add Tool Type'])

    <form method="post" action="/tools/types/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.button', ['label' => 'Add Tool Type'])

    </form>

</section>

@endsection
