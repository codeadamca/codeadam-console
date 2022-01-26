@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Pages'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Pages'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>Topic</th>
            <th>Slug</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($pages as $page): ?>
            <tr>
                <td>
                    @if ($page->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$page->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$page->title}}
                </td>
                <td>
                    @if ($page->topic()->first()->image)
                        <img src="{{asset('storage/'.$page->topic()->first()->image)}}" width="50">
                    @endif
                </td>
                <td>
                    {{$page->slug}}
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
