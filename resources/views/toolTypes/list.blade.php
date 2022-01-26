@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Tool Tags'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Tool Types', 'links' => ['Manage Tools' => '/articles/list']])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th>Title</th>
            <th class="w3-center">Toola</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($toolTypes as $toolType): ?>
            <tr>
                <td>
                    {{$toolType->title}}
                </td>
                <td class="w3-center">
                    {{$toolType->tools()->count()}}
                </td>
                <td>
                    <a href="/tools/types/edit/{{$toolType->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/tools/types/delete/{{$toolType->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Article Type', 'href' => '/tools/types/add'])

</section>

@endsection
