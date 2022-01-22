@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Add Topic'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Topics' => '/topics/list'], 'title' => 'Add Topic'])

    <form method="post" action="/topics/add" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title'])

        @include ('layout.forms.text', ['name' => 'url', 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'slug'])

        @include ('layout.forms.text', ['name' => 'icon', 'label' => 'Font Awesome Icon'])

        @include ('layout.forms.select', ['name' => 'teaching', 'label' => 'Display on Teaching Page', 'options' => $teachings])

        @include ('layout.forms.select', ['name' => 'background', 'label' => 'Banner Background', 'options' => $backgrounds])

        @include ('layout.forms.button', ['label' => 'Add Topic'])

    </form>

</section>

@endsection
