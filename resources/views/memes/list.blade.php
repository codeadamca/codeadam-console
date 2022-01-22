@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Memes'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Memes'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($memes as $meme): ?>
            <tr>
                <td>
                    @if ($meme->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$meme->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$meme->title}}
                    @if ($meme->tags()->count())
                        <br>
                        <small>
                            {{implode(', ', $meme->tags()->pluck('tags.title')->toArray())}}
                        </small>
                    @endif
                </td>
                <td>
                    <a href="/memes/image/{{$meme->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/memes/edit/{{$meme->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/memes/delete/{{$meme->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="w3-center">
        <a href="/memes/add" class="w3-button w3-orange">Add Meme</a>
    </div>

</section>

@endsection
