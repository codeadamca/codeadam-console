<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Social;

class SocialController extends Controller
{
    public function list()
    {

        return view('socials.list', [
            'socials' => Social::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('socials.add', [
            'abouts'=> Social::abouts(),
            'homes'=> Social::homes(),
            'headers'=> Social::headers(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable',
            'about' => 'required',
            'home' => 'required',
            'header' => 'required',
        ]);

        $social = new Social();
        $social->create($attributes);

        return redirect('/socials/list')
            ->with('message', 'Social Asset has been added!');

    }

    public function editForm(Social $social)
    {

        return view('socials.edit', [
            'social' => $social,
            'abouts'=> Social::abouts(),
            'homes'=> Social::homes(),
            'headers'=> Social::headers(),
        ]);

    }

    public function edit(Social $social)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable',
            'about' => 'required',
            'home' => 'required',
            'header' => 'required',
        ]);

        $social->update($attributes);

        return redirect('/socials/list')
            ->with('message', 'Social Asset has been edited!');

    }

    public function delete(Social $social)
    {
        
        if($social->image) Storage::delete($social->image);
        
        $social->delete();

        return redirect('/socials/list')
            ->with('message', 'Social Asset has been deleted!');                
        
    }

    public function imageForm(Social $social)
    {
        return view('socials.image', [
            'social' => $social,
        ]);
    }

    public function image(Social $social)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($social->image) Storage::delete($social->image);
        
        $path = request()->file('image')->store('socials');

        $social->image = $path;
        $social->save();
        
        return redirect('/socials/list')
            ->with('message', 'Social Asset image has been edited!');
    }

    public function deleteImage(Social $social)
    {

        if($social->image) Storage::delete($social->image);

        $social->image = "";
        $social->save();

        return redirect('/socials/list')
            ->with('message', 'Social image has been deleted!');

    }
}
