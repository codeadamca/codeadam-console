<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Journal;
use App\Models\Topic;

class JournalController extends Controller
{
    public function list()
    {

        return view('journals.list', [
            'journals' => Journal::orderBy('published_at', 'DESC')->get()
        ]);

    }

    public function addForm()
    {

        return view('journals.add', [
            'journal_topics' => Topic::orderBy('title')->get(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'published_at' => 'required',
            'topics' => 'nullable',
        ]);

        $journal = new Journal();
        $journal->create($attributes);

        return redirect('/journals/list')
            ->with('message', 'Journal has been added!');

    }

    public function editForm(Journal $journal)
    {
        
        return view('journals.edit', [
            'journal' => $journal,
            'journal_topics' => Topic::orderBy('title')->get(),
        ]);

    }

    public function edit(Journal $journal)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'published_at' => 'required',
            'topics' => 'nullable',
        ]);

        $journal->update($attributes);

        return redirect('/journals/list')
            ->with('message', 'Journal has been edited!');

    }

    public function delete(Journal $journal)
    {
        
        Storage::delete($journal->image);
        
        $journal->delete();

        return redirect('/journals/list')
            ->with('message', 'Journal has been deleted!');                
        
    }

    public function imageForm(Journal $journal)
    {

        return view('journals.image', [
            'journal' => $journal,
        ]);
    }

    public function image(Journal $journal)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($journal->image);
        
        $path = request()->file('image')->store('journals');

        $journal->image = $path;
        $journal->save();
        
        return redirect('/journals/list')
            ->with('message', 'Journal image has been edited!');
    }

    public function deleteImage(Journal $journal)
    {

        Storage::delete($journal->image);

        $journal->image = "";
        $journal->save();

        return redirect('/journals/list')
            ->with('message', 'Journal image has been deleted!');

    }
}
