<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\LivecodeUser;

class LivecodeUserController extends Controller
{
    public function list()
    {

        return view('livecodeUsers.list', [
            'livecodeUsers' => LivecodeUser::orderBy('github')->get()
        ]);

    }

    public function delete(LivecodeUser $livecodeUser)
    {
        
        // $livecodeUser->delete();

        return redirect('/livecode/users/list')
            ->with('message', 'LiveCode User has been deleted!');                
        
    }
}
