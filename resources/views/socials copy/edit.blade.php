@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Social Asset'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Social Assets' => '/socials/list'], 'title' => 'Edit Social Asset: '.$social->title])

    <form method="post" action="/socials/edit/{{$social->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $social->title])

        @include ('layout.forms.text', ['name' => 'url', 'value' => $social->url, 'label' => 'URL'])

        @include ('layout.forms.text', ['name' => 'icon', 'value' => $social->icon, 'label' => 'Font Awesome Icon'])
        
        @include ('layout.forms.select', ['name' => 'about', 'label' => 'Display on About Page', 'options' => $abouts, 'selected' => $social->about])

        @include ('layout.forms.select', ['name' => 'home', 'label' => 'Display on Home Page', 'options' => $homes, 'selected' => $social->home])

        @include ('layout.forms.select', ['name' => 'header', 'label' => 'Display in Header', 'options' => $headers, 'selected' => $social->header])

        @include ('layout.forms.button', ['label' => 'Edit Social Asset'])

    </form>

</section>

@endsection
