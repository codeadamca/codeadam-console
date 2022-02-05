@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Topics'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Topics'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th class="ca-col-image"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>URL</th>
            <th>Slug</th>
            <th>Pages</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($topics as $topic): ?>
            <tr>
                <td>
                    {{$topic->id}}
                </td>
                <td>
                    @if ($topic->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$topic->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    @if ($topic->banner)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$topic->banner)}}" width="50">
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
                    <small>
                        <br>
                        @if ($topic->background == 'Dark')
                            <i class="fas fa-image"></i>
                        @else
                            <i class="far fa-image"></i>
                        @endif
                        @if ($topic->teaching == 'Yes')
                        <i class="fas fa-laptop-code"></i>
                        @endif
                    </small>
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
                    {{$topic->pages()->get()->count()}}
                </td>
                <td>
                    <a href="/topics/image/{{$topic->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/topics/banner/{{$topic->id}}">
                        <i class="fas fa-image"></i> 
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

    @include ('layout.forms.button', ['label' => 'Add Topic', 'href' => '/topics/add'])

</section>

@endsection
