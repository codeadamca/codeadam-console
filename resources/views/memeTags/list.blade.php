@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Meme Tags'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Meme Tags', 'links' => ['Manage Memes' => '/memes/list']])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th>Title</th>
            <th class="w3-center">Memes</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($tags as $tag): ?>
            <tr>
                <td>
                    {{$tag->title}}
                </td>
                <td class="w3-center">
                    {{$tag->memes()->count()}}
                </td>
                <td>
                    <a href="/memes/tags/edit/{{$tag->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/memes/tags/delete/{{$tag->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Meme Tag', 'href' => '/memes/tags/add'])

</section>

@endsection
