@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    @include ('layout.title', ['title' => 'Edit Evaluation'])

    @include ('layout.breadcrumbs', ['links' => ['Manage Evalutions' => '/evaluations/list'], 'title' => 'Edit Evaluation: '.$evaluation->title])

    <form method="post" action="/evaluations/edit/{{$evaluation->id}}" novalidate class="w3-margin-bottom" autocomplete="off">

        @csrf

        @include ('layout.forms.text', ['name' => 'title', 'value' => $evaluation->title])

        @include ('layout.forms.textarea', ['name' => 'content', 'value' => $evaluation->content])

        @include ('layout.forms.button', ['label' => 'Edit Evaluation'])

    </form>

</section>

@endsection
