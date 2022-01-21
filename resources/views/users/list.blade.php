@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    <h2 class="w3-text-orange w3-center">Manage Users</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        Manage Users
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>
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

    <div class="w3-center">
        <a href="/users/add" class="w3-button w3-orange">Add User</a>
    </div>

</section>

@endsection
