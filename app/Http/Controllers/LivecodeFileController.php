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

        $files = LivecodeFile::orderBy('updated_at')->get();

        foreach($files as $key => $file)
        {
            $files[$key]['filename'] = 'test.html';
            $files[$key]['filetype'] = 'html';
            // $files[$key]['user'] = LivecodeUser::find($file['livecode_user_id']);
        }

        return view('livecodeFiles.list', [
            'livecodeFiles' => $files
        ]);

    }

    public function delete(LivecodeFile $livecodeFile)
    {
        
        $livecodeFile->delete();

        return redirect('/livecode/users/files/list')
            ->with('message', 'LiveCode File has been deleted!');                
        
    }
    
}
