<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\LivecodeFile;

class LivecodeFileController extends Controller
{
    public function list()
    {

        return view('livecodeFiles.list', [
            'livecodeFiles' => LivecodeFile::orderBy('updated_at')->get()
        ]);

    }

    public function delete(LivecodeFile $livecodeFile)
    {
        
        $livecodeFile->delete();

        return redirect('/livecode/users/files/list')
            ->with('message', 'LiveCode File has been deleted!');                
        
    }
}
