@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    <h2 class="w3-text-orange w3-center">Manage Topics</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        Manage Topics
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-image"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>URL</th>
            <th>Tag</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($topics as $topic): ?>
            <tr>
                <td>
                    @if ($topic->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$topic->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td class="w3-center">
                    @if ($topic->icon)
                        <i class="{{$topic->icon}} fa-2x"></i>
                    @endif
                </td>
                <td>
                    {{$topic->title}}
                </td>
                <td>
                    @if ($topic->url)
                        <a href="{{$topic->url}}">{{$topic->url}}</a>
                    @endif
                </td>
                <td>
                    @if ($topic->slug)
                        {{$topic->slug}}
                    @endif
                </td>
                <td>
                    <a href="/topics/image/{{$topic->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/topics/edit/{{$topic->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/topics/delete/{{$topic->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="w3-center">
        <a href="/topics/add" class="w3-button w3-orange">Add Topic</a>
    </div>

</section>

@endsection
