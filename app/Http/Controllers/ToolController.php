<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\Tool;
use App\Models\ToolType;

class ToolController extends Controller
{

    public function list()
    {

        return view('tools.list', [
            'tools' => Tool::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('tools.add', [
            'tool_types' => ToolType::orderBy('title')->get(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'tool_type_id' => 'required',
        ]);

        $tool = new Tool();
        $tool->create($attributes);

        return redirect('/tools/list')
            ->with('message', 'Tool has been added!');

    }

    public function editForm(Tool $tool)
    {

        return view('tools.edit', [
            'tool' => $tool,
            'tool_types' => ToolType::orderBy('title')->get(),
        ]);

    }

    public function edit(Tool $tool)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'required|url',
            'tool_type_id' => 'required',
        ]);

        $tool->update($attributes);

        return redirect('/tools/list')
            ->with('message', 'Tool has been edited!');

    }

    public function delete(Tool $tool)
    {
        
        if($tool->image) Storage::delete($tool->image);
        
        $tool->delete();

        return redirect('/tools/list')
            ->with('message', 'Tool has been deleted!');                
        
    }

    public function imageForm(Tool $tool)
    {

        return view('tools.image', [
            'tool' => $tool,
        ]);

    }

    public function image(Tool $tool)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($tool->image) Storage::delete($tool->image);

        $tool->image = request()->file('image')->store('tools');
        $tool->save();
        
        return redirect('/tools/list')
            ->with('message', 'Tool image has been edited!');

    }

    public function deleteImage(Tool $tool)
    {

        if($tool->image) Storage::delete($tool->image);

        $tool->image = "";
        $tool->save();

        return redirect('/tools/list')
            ->with('message', 'Tool image has been deleted!');

    }
    
}
