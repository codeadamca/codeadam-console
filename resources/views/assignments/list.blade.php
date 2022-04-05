@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Assignments'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Assignments'])
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($assignments as $assignment): ?>
            <tr>
                <td>
                    {{$assignment->id}}
                </td>
                <td>
                    @if ($assignment->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$assignment->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$assignment->title}}
                    <br>
                    <small>
                        <a href="{{$assignment->url}}">{{$assignment->url}}</a>
                    </small>
                </td>
                <td>
                    <a href="/assignments/image/{{$assignment->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/assignments/edit/{{$assignment->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/assignments/delete/{{$assignment->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Assignment', 'href' => '/assignments/add'])
    
</section>

@endsection
