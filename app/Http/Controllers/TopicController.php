<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Page;
use App\Models\Topic;

class TopicController extends Controller
{

    public function list()
    {

        return view('topics.list', [
            'topics' => Topic::all()
        ]);

    }

    public function addForm()
    {

        return view('topics.add', [
            'teachings'=> Topic::teachings(),
            'backgrounds'=> Topic::backgrounds(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable',
            'teaching' => 'required',
            'background' => 'required',
        ]);

        $topic = new Topic();
        $topic->create($attributes);

        return redirect('/topics/list')
            ->with('message', 'Topic has been added!');

    }

    public function editForm(Topic $topic)
    {

        return view('topics.edit', [
            'topic' => $topic,
            'teachings'=> Topic::teachings(),
            'backgrounds'=> Topic::backgrounds(),
        ]);

    }

    public function edit(Topic $topic)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'url' => 'required|url',
            'icon' => 'nullable',
            'teaching' => 'required',
            'background' => 'required',
        ]);

        $topic->update($attributes);

        return redirect('/topics/list')
            ->with('message', 'Topic has been edited!');

    }

    public function delete(Topic $topic)
    {
        
        Storage::delete($topic->image);
        
        $topic->pages()->detach();
        $topic->delete();

        return redirect('/topics/list')
            ->with('message', 'Topic has been deleted!');                
        
    }

    public function imageForm(Topic $topic)
    {
        return view('topics.image', [
            'topic' => $topic,
        ]);
    }

    public function image(Topic $topic)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($topic->image);
        
        $path = request()->file('image')->store('topics');

        $topic->image = $path;
        $topic->save();
        
        return redirect('/topics/list')
            ->with('message', 'Topic image has been edited!');
    }

    public function deleteImage(Topic $topic)
    {

        Storage::delete($topic->image);

        $topic->image = "";
        $topic->save();

        return redirect('/topics/list')
            ->with('message', 'Topic image has been deleted!');

    }
}
