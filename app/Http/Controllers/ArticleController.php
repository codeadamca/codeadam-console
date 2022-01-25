<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Article;

class ArticleController extends Controller
{
    public function list()
    {

        return view('articles.list', [
            'articles' => Article::all()
        ]);

    }

    public function addForm()
    {

        return view('articles.add', [
            'homes'=> Article::homes(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|url',
            'resources' => 'nullable',
            'instagram_id' => 'nullable',
            'twitter_id' => 'nullable',
            'soundcloud_id' => 'nullable',
            'article_type_id' => 'required',
            'home' => 'required',
        ]);

        $article = new Article();
        $article->create($attributes);

        return redirect('/articles/list')
            ->with('message', 'Article has been added!');

    }

    public function editForm(Article $topic)
    {

        return view('articles.edit', [
            'article' => $article,
            'homes'=> Article::homes(),
        ]);

    }

    public function edit(Article $topic)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|url',
            'resources' => 'nullable',
            'instagram_id' => 'nullable',
            'twitter_id' => 'nullable',
            'soundcloud_id' => 'nullable',
            'article_type_id' => 'required',
            'home' => 'required',
        ]);

        $article->update($attributes);

        return redirect('/articles/list')
            ->with('message', 'Article has been edited!');

    }

    public function delete(Article $article)
    {
        
        Storage::delete($article->image);
        
        // $article->pages()->detach();
        $article->delete();

        return redirect('/articles/list')
            ->with('message', 'Article has been deleted!');                
        
    }

    public function imageForm(Article $article)
    {
        return view('articles.image', [
            'article' => $article,
        ]);
    }

    public function image(Article $article)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($article->image);
        
        $path = request()->file('image')->store('articles');

        $article->image = $path;
        $article->save();
        
        return redirect('/articles/list')
            ->with('message', 'Article image has been edited!');
    }
}
