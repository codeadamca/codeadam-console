<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Models\Evaluation;

class EvaluationController extends Controller
{

    public function list()
    {

        return view('evaluations.list', [
            'evaluations' => Evaluation::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('evaluations.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $evaluation = new Evaluation();
        $evaluation->create($attributes);
        
        return redirect('/evaluations/list')
            ->with('message', 'Evaluation has been added!');

    }

    public function editForm(Evaluation $evaluation)
    {

        return view('evaluations.edit', [
            'evaluation' => $evaluation,
        ]);

    }

    public function edit(Evaluation $evaluation)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $evaluation->update($attributes);

        return redirect('/evaluations/list')
            ->with('message', 'Evaluation has been edited!');

    }

    public function delete(Evaluation $evaluation)
    {
        
        $evaluation->delete();

        return redirect('/evaluations/list')
            ->with('message', 'Evaluation has been deleted!');                
        
    }
    
}
