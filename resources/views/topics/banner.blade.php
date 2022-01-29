@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Topic Banner'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Topics' => '/topics/list'], 'title' => 'Topic Banner: '.$topic->title])

    @include ('layout.elements.image', ['image' => $topic->banner, 'width' => 400, 'id' => $topic->id, 'type' => 'topics', 'name' => 'banner'])

    <form method="post" action="/topics/banner/{{$topic->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file', ['name' => 'banner'])

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
