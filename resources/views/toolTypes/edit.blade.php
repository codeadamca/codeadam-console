@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Tool Type'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Tools' => '/tools/list', 'Manage Tool Types' => '/tools/types/list'], 'title' => 'Edit Tool Type: '.$toolType->title])

    <form method="post" action="/tools/types/edit/{{$toolType->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $toolType->title])

        @include ('layout.forms.button', ['label' => 'Edit Tool Type'])

    </form>

</section>

@endsection
