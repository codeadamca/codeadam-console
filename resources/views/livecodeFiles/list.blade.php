@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage LiveCode Users'])

    @include ('layout.breadcrumbs', ['title' => 'Manage LiveCode Files', 'links' => ['Manage LiveCode Users' => '/livecode/users/list']])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Path</th>
            <th>GitHub</th>
            <th>Last Updated</th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($livecodeFiles as $livecodeFile): ?>
            <tr>
                <td>
                    {{$livecodeFile->id}}
                </td>
                <td>
                    @switch($livecodeFile->filetype)
                        @case('html')
                            <i class="fab fa-html5"></i>    
                            @break
                        @case('php')
                            <i class="fab fa-php"></i>
                            @break
                        @case('py')
                            <i class="fab fa-python"></i>
                            @break
                        @case('js')
                            <i class="fab fa-js"></i>
                            @break
                        @default
                    @endswitch
                </td>
                <td>
                    {{$livecodeFile->filename}}
                </td>
                <td>
                    {{$livecodeFile->user()->github}}
                </td>
                <td>
                    {{$livecodeFile->updated_at->diffForHumans()}}
                </td>
                <td>
                    <a href="/contributions/delete/{{$livecodeFile->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</section>

@endsection
