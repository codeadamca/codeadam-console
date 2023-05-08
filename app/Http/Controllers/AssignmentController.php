<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Assignment;
use App\Models\Topic;

class AssignmentController extends Controller
{

    public function list()
    {

        return view('assignments.list', [
            'assignments' => Assignment::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('assignments.add', [
            'assignment_topics' => Topic::orderBy('title')->get(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'github_id' => 'nullable',
            'topics' => 'nullable',
        ]);

        $assignment = new Assignment();
        $assignment->title = $attributes['title'];
        $assignment->url = $attributes['url'];
        $assignment->github_id = $attributes['github_id'];
        $assignment->save();

        if(isset($attributes['topics']))
        {
            foreach($attributes['topics'] as $topic)
            {
                $assignment->manyTopics()->attach($topic);
            }        
        }

        return redirect('/assignments/list')
            ->with('message', 'Assignment has been added!');

    }

    public function editForm(Assignment $assignment)
    {

        return view('assignments.edit', [
            'assignment' => $assignment,
            'assignment_topics' => Topic::orderBy('title')->get(),
        ]);

    }

    public function edit(Assignment $assignment)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'github_id' => 'nullable',
            'topics' => 'nullable',
        ]);

        $assignment->title = $attributes['title'];
        $assignment->url = $attributes['url'];
        $assignment->github_id = $attributes['github_id'];
        $assignment->save();

        $assignment->manyTopics()->detach();

        if(isset($attributes['topics']))
        {
            foreach($attributes['topics'] as $topic)
            {
                $assignment->manyTopics()->attach($topic);
            }  
        }

        return redirect('/assignments/list')
            ->with('message', 'Assignment has been edited!');

    }

    public function delete(Assignment $assignment)
    {

        $assignment->manyTopics()->detach();
        $assignment->delete();

        return redirect('/assignments/list')
            ->with('message', 'Assignment has been deleted!');                
        
    }

    public function imageForm(Assignment $assignment)
    {
        return view('assignments.image', [
            'assignment' => $assignment,
        ]);
    }

    public function image(Assignment $assignment)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($assignment->image) Storage::delete($assignment->image);
        
        $path = request()->file('image')->store('assignments');

        $assignment->image = $path;
        $assignment->save();
        
        return redirect('/assignments/list')
            ->with('message', 'Assignment image has been edited!');
    }

    public function deleteImage(Assignment $assignment)
    {

        if($assignment->image) Storage::delete($assignment->image);

        $assignment->assignment = "";
        $assignment->save();

        return redirect('/assignments/list')
            ->with('message', 'Assignment image has been deleted!');

    }
    
}
