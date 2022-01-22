@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Meme'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list'], 'title' => 'Edit Meme: '.$meme->title])

    <form method="post" action="/memes/edit/{{$meme->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $meme->title])

        @include ('layout.forms.select', ['name' => 'tag_id', 'label' => 'Tags', 'options' => $tags, 'type' => 'multiple', 'selected' => $meme->tags()->pluck('tag_id')->toArray()])

        @include ('layout.forms.button', ['label' => 'Edit Meme'])

    </form>

</section>

@endsection
