@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Users'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Users'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first}} {{$user->last}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->format('M j, Y')}}</td>
                <td>
                    <a href="/users/edit/{{$user->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    @if (Auth::id() != $user->id)
                        <a href="/users/delete/{{$user->id}}">
                            <i class="fas fa-trash-alt mute"></i>
                        </a>
                    @endif
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add User', 'href' => '/users/add'])

</section>

@endsection
