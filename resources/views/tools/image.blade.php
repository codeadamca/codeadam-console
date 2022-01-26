@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Tool Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Tools' => '/tools/list'], 'title' => 'Tool Image: '.$tool->title])

    @include ('layout.elements.image', ['image' => $tool->image, 'width' => 400, 'id' => $tool->id, 'type' => 'tools'])

    <form method="post" action="/tools/image/{{$tool->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
