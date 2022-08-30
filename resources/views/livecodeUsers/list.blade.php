@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage LiveCode Users'])

    @include ('layout.breadcrumbs', ['title' => 'Manage LiveCode Users'])
    
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
                        <br>
                        @if ($livecodeUser->files->count())
                            <a href="/livecode/users/files">View Files</a>
                        @endif
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
                    <a href="/contributions/delete/{{$livecodeUser->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</section>

@endsection
