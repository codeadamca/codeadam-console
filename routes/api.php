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
        $articles = Article::where('article_type_id', $value)->orderBy('title')->get();
    }
    elseif ($filter and $value)
    {
        $articles = Article::where($filter, $value)->orderBy('title')->get();
    }
    else
    {
        $articles = Article::all();
    }

    foreach($articles as $key => $article)
    {
        if ($articles[$key]->image)
        {
            $articles[$key]->image = env('APP_URL') . 'storage/' . $articles[$key]->image;
        }
        if ($articles[$key]->resources)
        {
            $resources = preg_split('/\r\n|\n\r|\r|\n|,/', $articles[$key]->resources);
            $newResources = array();

            for($i = 0; $i < count($resources); $i += 2)
            {
                $newResources[] = array('name' => $resources[$i], 'url' => $resources[$i + 1]);
            }
            $articles[$key]->resources = $newResources;
        }
    }

    return $articles;


})->where('filter', 'type|home')->where('value', 'yes|no|[0-9]+');



Route::get('/evaluations', function () {

    return Evaluation::all();

});



Route::get('/memes/tag/{tag?}', function (Tag $tag) {

    $memes = $tag->manyMemes()->get();

    foreach($memes as $key => $meme)
    {
        if ($memes[$key]->image)
        {
            $memes[$key]->image = env('APP_URL') . 'storage/' . $memes[$key]->image;
        }
    }

    return $memes;

})->where('type', '[0-9]+');



Route::get('/pages/topic/{topic?}', function (Topic $topic) {

    $pages = Page::where('topic_id', $topic->id)->orderBy('published_at')->get();

    foreach($pages as $key => $page)
    {
        if ($pages[$key]->image)
        {
            $pages[$key]->image = env('APP_URL') . 'storage/' . $pages[$key]->image;
        }
    }

    return $pages;

});

Route::get('/pages/profile/{page?}', function (Page $page) {

    if ($page->image)
    {
        $page->image = env('APP_URL') . 'storage/' . $page->image;
    }

    return $page;

});



Route::get('/socials/{filter?}/{value?}', function ($filter = false, $value = false) {

    if ($filter and $value) 
    {
        $socials = Social::where($filter, $value)->orderBy('title')->get();
    }
    else
    {
        $socials = Social::orderBy('title')->get();
    }

    foreach($socials as $key => $social)
    {
        if ($socials[$key]->image)
        {
            $socials[$key]->image = env('APP_URL') . 'storage/' . $socials[$key]->image;
        }
    }

    return $socials;

})->where('filter', 'home|about|header')->where('value', 'yes|no');


Route::get('/toolTypes', function() {

    return ToolType::all();

});

Route::get('/tools/type/{toolType?}', function (ToolType $toolType) {

    $tools = Tool::where('tool_type_id', $toolType->id)->orderBy('title')->get();

    foreach($tools as $key => $tool)
    {
        if ($tools[$key]->image)
        {
            $tools[$key]->image = env('APP_URL') . 'storage/' . $tools[$key]->image;
        }
    }

    return $tools;

})->where('type', '[0-9]+');



Route::get('/topics/{filter?}/{value?}', function ($filter = null, $value = null) {

    if ($filter and $value)
    {
        $topics = Topic::where($filter, $value)->orderBy('title')->get();
    }
    else 
    {
        $topics = Topic::orderBy('title')->get();
    }

    foreach($topics as $key => $topic)
    {
        if ($topics[$key]->image)
        {
            $topics[$key]->image = env('APP_URL') . 'storage/' . $topics[$key]->image;
        }
        $topics[$key]->pages = $topic->pages()->count();
    }

    return $topics;

})->where('filter', 'teaching|background')->where('value', 'yes|no|light|dark');

Route::get('/topics/page/{page?}', function (Page $page) {

    $topics = $page->manyTopics()->get();

    foreach($topics as $key => $topic)
    {
        if ($topics[$key]->image)
        {
            $topics[$key]->image = env('APP_URL') . 'storage/' . $topics[$key]->image;
        }
    }

    return $topics;

});