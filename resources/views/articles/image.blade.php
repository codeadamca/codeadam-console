@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Article Image'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list'], 'title' => 'Article Image: '.$article->title])

    @include ('layout.elements.image', ['image' => $article->image, 'width' => 400, 'id' => $article->id, 'type' => 'articles'])

    <form method="post" action="/articles/image/{{$article->id}}" novalidate class="w3-margin-bottom" enctype="multipart/form-data" autocomplete="off">

        @csrf

        @include ('layout.forms.file')

        @include ('layout.forms.button', ['label' => 'Add Image'])

    </form>

</section>

@endsection
