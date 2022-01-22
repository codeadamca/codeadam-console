@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Meme'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list'], 'title' => 'Add Meme'])

    <form method="post" action="/memes/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.select', ['name' => 'tag_id', 'label' => 'Tags', 'options' => $tags, 'type' => 'multiple'])

        @include ('layout.forms.button', ['label' => 'Add Meme'])

    </form>

</section>

@endsection
