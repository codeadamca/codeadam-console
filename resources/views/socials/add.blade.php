@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Topic'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Topics' => '/socials/list'], 'title' => 'Add Social Asset'])

    <form method="post" action="/socials/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'icon', 'label' => 'Font Awesome Icon'])

        @include ('layout.forms.select', ['name' => 'about', 'label' => 'Display on About Page', 'options' => $abouts])

        @include ('layout.forms.select', ['name' => 'home', 'label' => 'Display on Home Page', 'options' => $homes])

        @include ('layout.forms.select', ['name' => 'header', 'label' => 'Display in Header', 'options' => $headers])

        @include ('layout.forms.button', ['label' => 'Add Social Asset'])

    </form>

</section>

@endsection
