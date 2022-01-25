@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Articles'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Articles'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>URL</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($articles as $article): ?>
            <tr>
                <td>
                    @if ($article->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$article->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$article->title}}
                </td>
                <td>
                    @if ($article->url)
                        <a href="{{$article->url}}">{{$article->url}}</a>
                    @endif
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
