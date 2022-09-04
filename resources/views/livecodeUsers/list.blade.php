@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage LiveCode Users'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage LiveCode Users'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/livecode/users/files/list">Manage LiveCode Files</a>
        </div>
    </div>
    
    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>GitHub</th>
            <th class="w3-center">Files</th>
            <th class="w3-center">Count</th>
            <th>Last Displayed</th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($livecodeUsers as $livecodeUser): ?>
            <tr>
                <td>
                    {{$livecodeUser->id}}
                </td>
                <td>
                    <div class="w3-center w3-light-grey w3-padding w3-border">
                        <img src="https://avatars.githubusercontent.com/{{$livecodeUser->github}}" width="50">
                    </div>
                </td>
                <td>
                    <a href="https://github.com/{{$livecodeUser->github}}">
                        @if ($livecodeUser->display) 
                            {{$livecodeUser->display}}
                        @else
                            {{$livecodeUser->github}}
                        @endif
                    </a>
                    <br>
                    <small>
                        <a href="https://github.com/{{$livecodeUser->github}}">https://github.com/{{$livecodeUser->github}}</a>
                    </small>
                </td>
                <td class="w3-center">
                    {{$livecodeUser->files->count()}}
                </td>
                <td class="w3-center">
                    {{$livecodeUser->count}}
                </td>
                <td>
                    {{$livecodeUser->updated_at->diffForHumans()}}
                </td>
                <td>
                    <a href="/livecode/users/delete/{{$livecodeUser->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</section>

@endsection
