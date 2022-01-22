@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Evaluations'])

    @include ('layout.breadcrumbs', ['title' => 'Add Evaluation'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th>Content</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($evaluations as $evaluation): ?>
            <tr>
                <td>
                    {{$evaluation->title}}
                    <br>
                    <small>
                        <i class="fas fa-quote-left"></i>
                        {{$evaluation->content}}
                        <i class="fas fa-quote-right"></i>
                    </small>
                </td>
                <td>
                    <a href="/evaluations/edit/{{$evaluation->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/evaluations/delete/{{$evaluation->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Evaluation', 'href' => '/evaluations/add'])

</section>

@endsection
