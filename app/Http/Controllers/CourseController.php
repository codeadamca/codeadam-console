<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Course;
use App\Models\Topic;

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

        return view('courses.add', [
            'course_topics' => Topic::orderBy('title')->get(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'url' => 'required|url',
            'description' => 'nullable',
            'topics' => 'nullable',
        ]);

        $course = new Course();
        $course = Course::find($course->create($attributes)->id);
        $course->manyTopics()->attach($attributes['topics']);

        return redirect('/courses/list')
            ->with('message', 'Course has been added!');

    }

    public function editForm(Course $course)
    {

        return view('courses.edit', [
            'course' => $course,
            'course_topics' => Topic::orderBy('title')->get(),
        ]);

    }

    public function edit(Course $course)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'url' => 'required|url',
            'description' => 'nullable',
            'topics' => 'nullable',
        ]);

        $course->update($attributes);
        $course->manyTopics()->sync($attributes['topics']);
        
        return redirect('/courses/list')
            ->with('message', 'Course has been edited!');

    }

    public function delete(Course $course)
    {
        
        $course->manyTopics()->detach();
        $course->delete();

        return redirect('/courses/list')
            ->with('message', 'Course has been deleted!');                
        
    }
}
