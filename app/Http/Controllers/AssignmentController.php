<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\Assignment;

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

        return view('assignments.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $assignment = new Evaluation();
        $assignment->title = $attributes['title'];
        $assignment->url = $attributes['url'];
        $assignment->save();

        return redirect('/assignments/list')
            ->with('message', 'Assignment has been added!');

    }

    public function editForm(Assignment $assignment)
    {

        return view('assignments.edit', [
            'assignment' => $assignment,
        ]);

    }

    public function edit(Assignment $assignment)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);

        $assignment->title = $attributes['title'];
        $assignment->url = $attributes['url'];
        $assignment->save();

        return redirect('/assignments/list')
            ->with('message', 'Assignment has been edited!');

    }

    public function delete(Assignment $assignment)
    {
        
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

        Storage::delete($assignment->image);
        
        $path = request()->file('image')->store('assignments');

        $assignment->image = $path;
        $assignment->save();
        
        return redirect('/assignments/list')
            ->with('message', 'Assignment image has been edited!');
    }

    public function deleteImage(Assignment $assignment)
    {

        Storage::delete($assignment->image);

        $assignment->assignment = "";
        $assignment->save();

        return redirect('/assignments/list')
            ->with('message', 'Assignment image has been deleted!');

    }
    
}
