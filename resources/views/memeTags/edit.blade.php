@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Meme Tag'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list', 'Manage Meme Tags' => '/memes/tags/list'], 'title' => 'Edit Meme Tag: '.$tag->title])

    <form method="post" action="/memes/tags/edit/{{$tag->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $tag->title])

        @include ('layout.forms.button', ['label' => 'Edit Meme Tag'])

    </form>

</section>

@endsection
