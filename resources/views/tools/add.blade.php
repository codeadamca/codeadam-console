@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Tool'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Tools' => '/tools/list'], 'title' => 'Add Tool'])

    <form method="post" action="/tools/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.select', ['name' => 'tool_type_id', 'label' => 'Types', 'options' => $tool_types, 'type' => 'table'])

        @include ('layout.forms.button', ['label' => 'Add Tool'])

    </form>

</section>

@endsection
