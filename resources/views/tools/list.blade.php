@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Tools'])

    <div>
        <div class="w3-twothird">
        @include ('layout.breadcrumbs', ['title' => 'Manage Tools'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/tools/types/list">Manage Tool Types</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>URL</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($tools as $tool): ?>
            <tr>
                <td>
                    @if ($tool->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$tool->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$tool->title}}
                </td>
                <td>
                    @if ($tool->url)
                        <a href="{{$tool->url}}">{{$tool->url}}</a>
                    @endif
                </td>
                <td>
                    <a href="/tools/image/{{$tool->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/tools/edit/{{$tool->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/tools/delete/{{$tool->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Tool', 'href' => '/tools/add'])
    
</section>

@endsection
