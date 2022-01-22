<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Meme;
use App\Models\Tag;

class MemesController extends Controller
{

    public function list()
    {

        return view('memes.list', [
            'memes' => Meme::all()
        ]);

    }

    public function addForm()
    {

        return view('memes.add', [
            'tags' => Tag::all()
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'tag_id' => 'required',
        ]);

        $meme = new Meme();
        $meme->title = $attributes['title'];
        $meme->save();

        foreach($attributes['tag_id'] as $tag)
        {
            $meme->tags()->attach($tag);
        }

        return redirect('/memes/list')
            ->with('message', 'Meme has been added!');

    }

    public function editForm(Meme $meme)
    {

        return view('memes.edit', [
            'meme' => $meme,
            'tags' => Tag::all()
        ]);

    }

    public function edit(Meme $meme)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'tag_id' => 'required',
        ]);

        $meme->title = $attributes['title'];
        $meme->save();

        $meme->tags()->detach();

        foreach($attributes['tag_id'] as $tag)
        {
            $meme->tags()->attach($tag);
        }

        return redirect('/memes/list')
            ->with('message', 'Meme has been edited!');

    }

    public function delete(Meme $meme)
    {
        
        $meme->tags()->detach();
        $meme->delete();

        return redirect('/memes/list')
            ->with('message', 'Meme has been deleted!');                
        
    }

    public function imageForm(Meme $meme)
    {
        return view('memes.image', [
            'meme' => $meme,
        ]);
    }

    public function image(Meme $meme)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($meme->image);
        
        $path = request()->file('image')->store('memes');

        $meme->image = $path;
        $meme->save();
        
        return redirect('/memes/list')
            ->with('message', 'Meme image has been edited!');
    }
    
}
