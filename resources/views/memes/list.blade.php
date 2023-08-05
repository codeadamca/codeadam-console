@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Memes'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Memes'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/memes/tags/list">Manage Meme Tags</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Last Displayed</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($memes as $meme): ?>
            <tr>
                <td>
                    {{$meme->id}}
                </td>
                <td>
                    @if ($meme->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$meme->image)}}" width="250">
                        </div>
                    @endif
                </td>
                <td>
                    {{$meme->title}}
                    @if ($meme->manyTags()->count())
                        <br>
                        <small>
                            {{implode(', ', $meme->manyTags()->pluck('tags.title')->toArray())}}
                        </small>
                    @endif
                </td>
                <td>
                    @if ($meme->displayed_at)
                        {{\Carbon\Carbon::parse($meme->displayed_at)->diffForHumans()}}
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

    @include ('layout.forms.button', ['label' => 'Add Meme', 'href' => '/memes/add'])
    
</section>

@endsection
