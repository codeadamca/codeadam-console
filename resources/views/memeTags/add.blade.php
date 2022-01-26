@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Meme Tag'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Memes' => '/memes/list', 'Manage Meme Tags' => '/memes/tags/list'], 'title' => 'Add Meme Tag'])

    <form method="post" action="/memes/tags/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.button', ['label' => 'Add Meme Tag'])

    </form>

</section>

@endsection
