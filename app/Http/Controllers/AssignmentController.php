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
        $assignment = Assignment::find($assignment->create($attributes)->id);
        $assignment->manyTopics()->attach($attributes['topics']);

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

        $assignment->update($attributes);
        $assignment->manyTopics()->sync($attributes['topics']);

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
        
        $assignment->image = request()->file('image')->store('assignments');
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
