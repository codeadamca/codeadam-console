<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Article;
use App\Models\Evaluation;
use App\Models\Meme;
use App\Models\Page;
use App\Models\Social;
use App\Models\Tag;
use App\Models\Tool;
use App\Models\ToolType;
use App\Models\Topic;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/articles/{filter?}/{value?}', function ($filter, $value) {
    if ($filter == 'type' and $value) 
    {
        return Article::where('article_type_id', $value)->orderBy('title')->get();
    }
    elseif ($filter and $value) 
    {
        return Article::where($filter, $value)->orderBy('title')->get();
    }
    else
    {
        return Article::all();
    }
})->where('filter', 'type|home')->where('value', 'yes|no|[0-9]+');



Route::get('/evaluations', function () {
    return Evaluation::all();
});



Route::get('/memes/tag/{tag?}', function (Tag $tag) {
    return $tag->manyMemes()->get();
})->where('type', '[0-9]+');



Route::get('/pages/topic/{topic?}', function (Topic $topic) {
    return Page::where('topic_id', $topic->id)->orderBy('published_at')->get();
});

Route::get('/pages/profile/{page?}', function (Page $page) {
    return $page;
});



Route::get('/socials/{filter?}/{value?}', function ($filter = false, $value = false) {
    if ($filter and $value) 
    {
        return Social::where($filter, $value)->orderBy('title')->get();
    }
    else
    {
        return Social::orderBy('title')->get();
    }
})->where('filter', 'home|about|header')->where('value', 'yes|no');



Route::get('/tools/type/{toolType?}', function (ToolType $toolType) {
    return Tool::where('tool_type_id', $toolType->id)->orderBy('title')->get();
})->where('type', '[0-9]+');



Route::get('/topics/{filter?}/{value?}', function ($filter = null, $value = null) {
    if ($filter and $value)
    {
        return Topic::where($filter, $value)->orderBy('title')->get();
    }
    else 
    {
        return Topic::orderBy('title')->get();
    }
})->where('filter', 'teaching|background')->where('value', 'yes|no|light|dark');

Route::get('/topics/page/{page?}', function (Page $page) {
    return $page->manyTopics()->get();
});