<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Models\ArticleType;

class ArticleTypeController extends Controller
{
    public function list()
    {

        return view('articleTypes.list', [
            'articleTypes' => ArticleType::orderBy('title')->get()
        ]);

    }

    public function addForm()
    {

        return view('articleTypes.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $articleType = new ArticleType();
        $articleType->title = $attributes['title'];
        $articleType->save();

        return redirect('/articles/types/list')
            ->with('message', 'Article Type has been added!');

    }

    public function editForm(ArticleType $articleType)
    {

        return view('articleTypes.edit', [
            'articleType' => $articleType,
        ]);

    }

    public function edit(ArticleType $articleType)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $articleType->title = $attributes['title'];
        $articleType->save();

        return redirect('/articles/types/list')
            ->with('message', 'Article Type has been edited!');

    }

    public function delete(ArticleType $articleType)
    {
        
        $articleType->delete();

        return redirect('/articles/types/list')
            ->with('message', 'Article Type has been deleted!');                
        
    }
}
