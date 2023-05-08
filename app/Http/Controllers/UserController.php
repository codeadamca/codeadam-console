<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\User;

class UserController extends Controller
{

    public function list()
    {

        return view('users.list', [
            'users' => User::orderBy('last')->get()
        ]);

    }

    public function addForm()
    {

        return view('users.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'first' => 'required',
            'last' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->create($attributes);

        return redirect('/users/list')
            ->with('message', 'User has been added!');

    }

    public function editForm(User $user)
    {

        return view('users.edit', [
            'user' => $user,
        ]);

    }

    public function edit(User $user)
    {

        $attributes = request()->validate([
            'first' => 'required',
            'last' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->update($attributes);
        
        /*
        if($attributes['password']) $user->password = $attributes['password'];
        $user->save();
        */

        return redirect('/users/list')
            ->with('message', 'User has been edited!');

    }

    public function delete(User $user)
    {

        if($user->id == auth()->user()->id)
        {
            return redirect('/users/list')
                ->with('message', 'Cannot delete your own user account!');        
        }
        
        $user->delete();

        return redirect('/users/list')
            ->with('message', 'User has been deleted!');                
        
    }
    
}
