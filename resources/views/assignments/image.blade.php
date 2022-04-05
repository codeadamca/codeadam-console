@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Assignment Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Assignments' => '/assignments/list'], 'title' => 'Assignment Image: '.$assignment->title])

    @include ('layout.elements.image', ['image' => $assignment->image, 'width' => 400, 'id' => $assignment->id, 'type' => 'assignments'])

    <form method="post" action="/assignments/image/{{$assignment->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
