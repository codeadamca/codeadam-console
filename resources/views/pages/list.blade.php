@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Pages'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Pages'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/topics/list">Manage Topics</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th></th>
            <th class="ca-col-image"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Slug</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($pages as $page): ?>
            <tr>
                <td>
                    {{$page->id}}
                </td>
                <td>
                    @if ($page->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$page->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    @if ($page->topic()->first()->image)
                        <img src="{{asset('storage/'.$page->topic()->first()->image)}}" width="50">
                    @endif
                </td>
                <td>
                    {{$page->title}}
                    <small>
                        <br>
                        {{date('F jS, Y', strtotime($page->published_at))}}
                        <br>
                        @if ($page->tinkercad_id)
                            <i class="fas fa-th"></i>
                        @endif
                        @if ($page->arduino_id)
                            <i class="fas fa-infinity"></i>
                        @endif
                        @if ($page->youtube_id)
                            <i class="fab fa-youtube"></i>
                        @endif
                        @if ($page->github_id)
                            <i class="fab fa-github"></i>
                        @endif                        
                    </small>
                </td>
                <td>
                    <a href="https://codeadam.ca/learning/{{$page->slug}}">
                        {{$page->slug}}
                    </a>
                </td>
                <td>
                    <a href="/pages/image/{{$page->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/pages/edit/{{$page->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/pages/delete/{{$page->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Page', 'href' => '/pages/add'])

</section>

@endsection
