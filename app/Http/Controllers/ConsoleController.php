<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ConsoleController extends Controller
{
    
    public function logout()
    {

        auth()->logout();
        return redirect('/');

    }

    public function loginForm()
    {

        return view('login');

    }

    public function login()
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes))
        {
            return redirect('/dashboard');
        }
        
        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid email/password combination']);

    }

    public function dashboard()
    {

        $links = [
            ['icon' => 'fas fa-file', 'text' => 'Sample Assignments', 'route' => '/assignments/list'],
            ['icon' => 'fas fa-columns', 'text' => 'Topics', 'route' => '/topics/list'],
            ['icon' => 'fas fa-newspaper', 'text' => 'Articles', 'route' => '/articles/list'],
            ['icon' => 'fas fa-chalkboard', 'text' => 'Pages', 'route' => '/pages/list'],
            ['icon' => 'fas fa-quote-left', 'text' => 'Evaluations', 'route' => '/evaluations/list'],
            ['icon' => 'fas fa-tools', 'text' => 'Tools', 'route' => '/tools/list'],
            ['icon' => 'fas fa-image', 'text' => 'Memes', 'route' => '/memes/list'],
            ['icon' => 'fas fa-share-alt-square', 'text' => 'Social', 'route' => '/socials/list'],
            ['icon' => 'fas fa-graduation-cap', 'text' => 'Courses', 'route' => '/courses/list'],
            ['icon' => 'fas fa-book', 'text' => 'Journals', 'route' => '/journals/list'],

            ['icon' => 'fas fa-code', 'text' => 'LiveCode', 'route' => '/livecode/users/list', 'colour' => 'blue'],

            ['icon' => 'fab fa-github', 'text' => 'GitHub Contributions', 'route' => '/contributions/list', 'colour' => 'black'],

            ['icon' => 'fas fa-user', 'text' => 'Users', 'route' => '/users/list', 'colour' => 'green'],
            
            ['icon' => 'fas fa-sign-out-alt', 'text' => 'Logout', 'route' => '/logout', 'colour' => 'red'],
        ];

        return view('dashboard', ['links' => $links]);
        
    }

}
