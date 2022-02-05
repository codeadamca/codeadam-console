@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Articles'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Articles'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/articles/types/list">Manage Article Types</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Type</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($articles as $article): ?>
            <tr>
                <td>
                    {{$article->id}}
                </td> 
                <td>
                    @if ($article->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$article->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$article->title}}
                    <small>
                        <br>
                        {{date('F jS, Y', strtotime($article->published_at))}}
                        <br>
                        @if ($article->instagram_id)
                            <i class="fab fa-instagram"></i>
                        @endif
                        @if ($article->twitter_id)
                            <i class="fab fa-twitter"></i>
                        @endif
                        @if ($article->soundcloud_id)
                            <i class="fab fa-soundcloud"></i>
                        @endif
                        @if ($article->home == 'Yes')
                            <i class="fas fa-home"></i>
                        @endif                        
                        @if ($article->url)
                            <a href="{{$article->url}}"><i class="fas fa-link"></i></a>
                        @endif
                    </small>
                </td>
                <td>
                    {{$article->type->title}}
                </td>
                <td>
                    <a href="/articles/image/{{$article->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/articles/edit/{{$article->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/articles/delete/{{$article->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Article', 'href' => '/articles/add'])

</section>

@endsection
