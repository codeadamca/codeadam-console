@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Social Assets'])

    @include ('layout.breadcrumbs', ['title' => 'Manage Social Assets'])

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th class="ca-col-image"></th>
            <th>Title</th>
            <th>URL</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($socials as $social): ?>
            <tr>
                <td>
                    {{$social->id}}
                </td>
                <td>
                    @if ($social->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$social->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td class="w3-center">
                    @if ($social->icon)
                        <i class="{{$social->icon}} fa-2x"></i>
                    @endif
                </td>
                <td>
                    {{$social->title}}
                    <small>
                        <br>
                        @if ($social->home == "Yes")
                            <i class="fas fa-home"></i>
                        @endif
                        @if ($social->about == "Yes")
                            <i class="fas fa-user"></i>
                        @endif
                        @if ($social->header)
                            <i class="fas fa-heading"></i>
                        @endif
                    </small>
                </td>
                <td>
                    @if ($social->url)
                        <a href="{{$social->url}}">{{$social->url}}</a>
                    @endif
                </td>
                <td>
                    <a href="/socials/image/{{$social->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/socials/edit/{{$social->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/socials/delete/{{$social->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Social Asset', 'href' => '/socials/add'])

</section>

@endsection
