@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Topic Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Topics' => '/topics/list'], 'title' => 'Topic Image: '.$topic->title])

    @include ('layout.elements.image', ['image' => $topic->image, 'width' => 400])

    <form method="post" action="/topics/image/{{$topic->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
