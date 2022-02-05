@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Article Tags'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Article Types', 'links' => ['Manage Articles' => '/articles/list']])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th>Title</th>
            <th class="w3-center">Articles</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($articleTypes as $articleType): ?>
            <tr>
                <td>
                    {{$articleType->id}}
                </td>
                <td>
                    {{$articleType->title}}
                </td>
                <td class="w3-center">
                    {{$articleType->articles()->count()}}
                </td>
                <td>
                    <a href="/articles/types/edit/{{$articleType->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/articles/types/delete/{{$articleType->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Article Type', 'href' => '/articles/types/add'])

</section>

@endsection
