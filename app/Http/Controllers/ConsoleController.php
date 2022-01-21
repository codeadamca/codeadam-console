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
            ['icon' => 'fas fa-user', 'text' => 'Manage Users', 'route' => '/users/list'],
            ['icon' => 'fas fa-columns', 'text' => 'Manage Topics', 'route' => '/topics/list'],
            ['icon' => 'fas fa-share-alt-square', 'text' => 'Manage Social', 'route' => '/socials/list'],
            ['icon' => 'fas fa-tools', 'text' => 'Manage Tools', 'route' => '/tools/list'],
            ['icon' => 'fas fa-newspaper', 'text' => 'Manage Articles', 'route' => '/articles/list'],
            ['icon' => 'fas fa-quote-left', 'text' => 'Manage Evaluations', 'route' => '/evaluations/list'],
            ['icon' => 'fas fa-chalkboard', 'text' => 'Manage Pages', 'route' => '/pages/list'],
            ['icon' => 'fas fa-sign-out-alt', 'text' => 'Logout', 'route' => '/logout'],
        ];

        return view('dashboard', ['links' => $links]);
    }

}
