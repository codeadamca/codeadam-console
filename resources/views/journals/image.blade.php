@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Journal Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Journals' => '/journals/list'], 'title' => 'Journal Image: '.$journal->title])

    @include ('layout.elements.image', ['image' => $journal->image, 'width' => 400, 'id' => $journal->id, 'type' => 'journals'])

    <form method="post" action="/journals/image/{{$journal->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
