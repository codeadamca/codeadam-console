@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-large">

    @include ('layout.title', ['title' => 'Manage Journals'])

    <div>
        <div class="w3-twothird">
            @include ('layout.breadcrumbs', ['title' => 'Manage Journals'])
        </div>
        <div class="w3-third w3-right-align w3-small ">
            <a href="/topics/list">Manage Topics</a>
        </div>
    </div>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-dark-grey">
            <th class="ca-col-icon"></th>
            <th class="ca-col-image"></th>
            <th>Name</th>
            <th>Topics</th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
            <th class="ca-col-icon"></th>
        </tr>
        <?php foreach($journals as $journal): ?>
            <tr>
                <td>
                    {{$journal->id}}
                </td> 
                <td>
                    @if ($journal->image)
                        <div class="w3-center w3-light-grey w3-padding w3-border">
                            <img src="{{asset('storage/'.$journal->image)}}" width="50">
                        </div>
                    @endif
                </td>
                <td>
                    {{$journal->name}}
                    <small>
                        {{$journal->description}}
                        <br>
                        {{date('F jS, Y', strtotime($journal->published_at))}}
                        <br>
                        @if ($journal->url)
                            <a href="{{$journal->url}}"><i class="fas fa-link"></i></a>
                        @endif
                    </small>
                </td>
                <td>
                    
                </td>
                <td>
                    <a href="/journals/image/{{$journal->id}}">
                        <i class="fas fa-camera"></i> 
                    </a>
                </td>
                <td>
                    <a href="/journals/edit/{{$journal->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="/journals/delete/{{$journal->id}}">
                        <i class="fas fa-trash-alt mute"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    @include ('layout.forms.button', ['label' => 'Add Journal', 'href' => '/journals/add'])

</section>

@endsection
