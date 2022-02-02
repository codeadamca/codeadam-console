<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Meme;
use App\Models\Tag;

class MemeController extends Controller
{

    public function list()
    {

        return view('memes.list', [
            'memes' => Meme::orderBy('title')->get()
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
            'tags' => 'required',
        ]);

        $meme = new Meme();
        $meme->title = $attributes['title'];
        $meme->save();

        foreach($attributes['tags'] as $tag)
        {
            $meme->manyTags()->attach($tag);
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
            'tags' => 'required',
        ]);

        $meme->title = $attributes['title'];
        $meme->save();

        $meme->manyTags()->detach();

        foreach($attributes['tags'] as $tag)
        {
            $meme->manyTags()->attach($tag);
        }

        return redirect('/memes/list')
            ->with('message', 'Meme has been edited!');

    }

    public function delete(Meme $meme)
    {
        
        $meme->manyTags()->detach();
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

    public function deleteImage(Meme $meme)
    {

        Storage::delete($meme->image);

        $meme->image = "";
        $meme->save();

        return redirect('/memes/list')
            ->with('message', 'Meme image has been deleted!');

    }
    
}
