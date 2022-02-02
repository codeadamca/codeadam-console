<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Tag;

class TagController extends Controller
{
    public function list()
    {

        return view('memeTags.list', [
            'tags' => Tag::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('memeTags.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $tag = new Tag();
        $tag->title = $attributes['title'];
        $tag->save();

        return redirect('/memes/tags/list')
            ->with('message', 'Tag has been added!');

    }

    public function editForm(Tag $tag)
    {

        return view('memeTags.edit', [
            'tag' => $tag,
        ]);

    }

    public function edit(Tag $tag)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $tag->title = $attributes['title'];
        $tag->save();

        return redirect('/memes/tags/list')
            ->with('message', 'Tag has been edited!');

    }

    public function delete(Tag $tag)
    {
        
        $tag->manyMemes()->detach();
        $tag->delete();

        return redirect('/memes/tags/list')
            ->with('message', 'Tag has been deleted!');                
        
    }
}
