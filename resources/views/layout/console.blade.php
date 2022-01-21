<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeAdam Website Admin</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{url('app.css')}}">

        <script src="https://kit.fontawesome.com/57a8a8c892.js" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
        <script src="{{url('app.js')}}"></script>
        
    </head>
    <body class="w3-text-dark-grey">

        <header class="w3-padding w3-center w3-border-bottom w3-margin">

            <h1 class="w3-text-red">CodeAdam Website Admin</h1>

            @if (Auth::check())
                <div class="w3-text-gray w3-small">
                    You are logged in as {{auth()->user()->first}} {{auth()->user()->last}}
                <div>
                <i class="fas fa-tachometer-alt"></i> <a href="/dashboard">Dashboard</a> | 
                <i class="fas fa-search"></i> <a href="/">Website Home Page</a> | 
                <i class="fas fa-sign-out-alt"></i> <a href="/logout">Log Out</a> 
            @endif

        </header>

        @if (session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
            </div>
        @endif

        @yield ('content')

        <footer class="w3-padding w3-container w3-center w3-border-top w3-margin">

            

        </footer>

    </body>
</html>