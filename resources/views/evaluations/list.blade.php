@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    <h2 class="w3-text-orange w3-center">Manage Evaluations</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        Manage Evaluations
    </div>

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

    <div class="w3-center">
        <a href="/evaluations/add" class="w3-button w3-orange">Add Evaluation</a>
    </div>

</section>

@endsection
