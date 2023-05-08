<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Page;
use App\Models\Topic;

class PageController extends Controller
{
    public function list()
    {

        return view('pages.list', [
            'pages' => Page::orderBy('published_at', 'DESC')->get()
        ]);

    }

    public function addForm()
    {

        return view('pages.add', [
            'page_topics' => Topic::orderBy('title')->get(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:pages',
            'tinkercad_id' => 'nullable',
            'arduino_id' => 'nullable',
            'github_id' => 'nullable',
            'youtube_id' => 'nullable',
            'topic_id' => 'required',
            'topics' => 'nullable',
            'published_at' => 'required',
        ]);

        $page = new Page();
        $page = Page::find($page->create($attributes)->id);
        $page->manyTopics()->attach($attributes['topics']);

        return redirect('/pages/list')
            ->with('message', 'Page has been added!');

    }

    public function editForm(Page $page)
    {

        return view('pages.edit', [
            'page' => $page,
            'page_topics' => Topic::orderBy('title')->get(),
        ]);

    }

    public function edit(Page $page)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => [
                'required',
                Rule::unique('pages')->ignore($page->id),
            ],
            'tinkercad_id' => 'nullable',
            'arduino_id' => 'nullable',
            'github_id' => 'nullable',
            'youtube_id' => 'nullable',
            'topic_id' => 'required',
            'topics' => 'nullable',
            'published_at' => 'required',
        ]);

        $page->update($attributes);
        $page->manyTopics()->sync($attributes['topics']);

        return redirect('/pages/list')
            ->with('message', 'Page has been edited!');

    }

    public function delete(Page $page)
    {
        
        if($page->image) Storage::delete($page->image);
        
        $page->manyTopics()->detach();
        $page->delete();

        return redirect('/pages/list')
            ->with('message', 'Page has been deleted!');                
        
    }

    public function imageForm(Page $page)
    {

        return view('pages.image', [
            'page' => $page,
        ]);

    }

    public function image(Page $page)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($page->image) Storage::delete($page->image);

        $article->image = request()->file('image')->store('pages');
        $article->save();
        
        return redirect('/pages/list')
            ->with('message', 'Page image has been edited!');

    }

    public function deleteImage(Page $page)
    {

        if($page->image) Storage::delete($page->image);

        $article->image = "";
        $article->save();

        return redirect('/pages/list')
            ->with('message', 'Page image has been deleted!');

    }
}
