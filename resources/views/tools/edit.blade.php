@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Tool'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Tools' => '/tools/list'], 'title' => 'Edit Tool: '.$tool->title])

    <form method="post" action="/tools/edit/{{$tool->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $tool->title])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL', 'value' => $tool->url])

        @include ('layout.forms.select', ['name' => 'tool_type_id', 'label' => 'Type', 'options' => $tool_types, 'type' => 'table', 'selected' => $tool->tool_type_id])

        @include ('layout.forms.button', ['label' => 'Edit Tool'])

    </form>

</section>

@endsection
