@extends ('layout.console')

@section ('content')

<section class="w3-padding ca-container-small">

    <h2 class="w3-text-orange w3-center">Add User</h2>

    <div class="w3-text-grey w3-small w3-margin-bottom">
        <a href="/dashboard">Dashboard</a> / 
        <a href="/users/list">Manage Users</a> / 
        Add User
    </div>

    <form method="post" action="/users/add" novalidate class="w3-margin-bottom">

        {{csrf_field()}}

        <div class="w3-margin-bottom">
            <label for="first">First Name:</label>
            <input type="text" name="first" id="first" value="{{old('first')}}" required class="w3-input w3-border">
            
            @if ($errors->first('first'))
                <span class="w3-text-red">{{$errors->first('first')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="last">Last Name:</label>
            <input type="text" name="last" id="last" value="{{old('last')}}" required class="w3-input w3-border">

            @if ($errors->first('last'))
                <span class="w3-text-red">{{$errors->first('last')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required class="w3-input w3-border">

            @if ($errors->first('email'))
                <span class="w3-text-red">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="w3-input w3-border">

            @if ($errors->first('password'))
                <span class="w3-text-red">{{$errors->first('password')}}</span>
            @endif
        </div>

        <div class="w3-center">
            <button type="submit" class="w3-button w3-green">Add User</button>
        </div>

    </form>

</section>

@endsection
