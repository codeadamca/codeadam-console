@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Contributions'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Contributions'])
    
    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Username</th>
            <th class="w3-center">Count</th>
            <th>Last Displayed</th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($contributions as $contribution): ?>
            <tr>
                <td>
                    {{$contribution->id}}
                </td>
                <td>
                    <div class="w3-center w3-light-grey w3-padding w3-border">
                        <img src="https://avatars.githubusercontent.com/{{$contribution->username}}" width="50">
                    </div>
                </td>
                <td>
                    <a href="https://github.com/{{$contribution->username}}">
                        {{$contribution->username}}
                    </a>
                    <br>
                    <small>
                        <a href="{{$contribution->referer}}">{{$contribution->referer}}</a>
                    </small>
                </td>
                <td class="w3-center">
                    {{$contribution->count}}
                </td>
                <td>
                    {{$contribution->updated_at->diffForHumans()}}
                </td>
                <td>
                    <a href="/contributions/delete/{{$contribution->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</section>

@endsection
