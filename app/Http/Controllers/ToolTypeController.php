<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\ToolType;

class ToolTypeController extends Controller
{
    public function list()
    {

        return view('toolTypes.list', [
            'toolTypes' => ToolType::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('toolTypes.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $toolType = new ToolType();
        $toolType->create($attributes);

        return redirect('/tools/types/list')
            ->with('message', 'Tool Type has been added!');

    }

    public function editForm(ToolType $toolType)
    {

        return view('toolTypes.edit', [
            'toolType' => $toolType,
        ]);

    }

    public function edit(ToolType $toolType)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $toolType->update($attributes);

        return redirect('/tools/types/list')
            ->with('message', 'Tool Type has been edited!');

    }

    public function delete(ToolType $toolType)
    {
        
        $toolType->delete();

        return redirect('/tools/types/list')
            ->with('message', 'Tool Type has been deleted!');                
        
    }
    
}
