<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Course;

class CourseController extends Controller
{
    public function list()
    {

        return view('courses.list', [
            'courses' => Course::orderBy('name')->get()
        ]);

    }

    public function addForm()
    {

        return view('courses.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'url' => 'required|url',
            'description' => 'nullable',
        ]);

        $course = new Course();
        $course->name = $attributes['name'];
        $course->code = $attributes['code'];
        $course->url = $attributes['url'];
        $course->description = $attributes['description'];
        $course->save();

        return redirect('/courses/list')
            ->with('message', 'Course has been added!');

    }

    public function editForm(Course $course)
    {

        return view('courses.edit', [
            'course' => $course,
        ]);

    }

    public function edit(Course $course)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'url' => 'required|url',
            'description' => 'nullable',
        ]);

        $course->name = $attributes['name'];
        $course->code = $attributes['code'];
        $course->url = $attributes['url'];
        $course->description = $attributes['description'];
        $course->save();

        return redirect('/courses/list')
            ->with('message', 'Course has been edited!');

    }

    public function delete(Course $course)
    {
        
        $course->delete();

        return redirect('/courses/list')
            ->with('message', 'Course has been deleted!');                
        
    }
}
