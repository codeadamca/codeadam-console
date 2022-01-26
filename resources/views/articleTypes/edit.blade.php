@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Article Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Articles' => '/articles/list', 'Manage Article Types' => '/articles/types/list'], 'title' => 'Edit Article Type: '.$articleType->title])

    <form method="post" action="/memes/tags/edit/{{$tag->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $articleType->title])

        @include ('layout.forms.button', ['label' => 'Edit Article Type'])

    </form>

</section>

@endsection
