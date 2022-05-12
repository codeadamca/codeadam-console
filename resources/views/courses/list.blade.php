@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Courses'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Courses'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/topics/list">Manage Topics</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Name</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($courses as $course): ?>
            <tr>
                <td>
                    {{$course->id}}
                </td>
                <td>
                    {{$course->name}} {{$course->code}}
                    <br>
                    <a href="{{$course->url}}">{{$course->url}}</a>
                </td>
                <td>
                    <a href="/courses/edit/{{$course->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/courses/delete/{{$course->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Course', 'href' => '/courses/add'])

</section>

@endsection
