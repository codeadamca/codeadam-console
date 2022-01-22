<?php

use App\Models\Project;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\MemesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/evaluations/list', [EvaluationsController::class, 'list'])->middleware('auth');
Route::get('/evaluations/add', [EvaluationsController::class, 'addForm'])->middleware('auth');
Route::post('/evaluations/add', [EvaluationsController::class, 'add'])->middleware('auth');
Route::get('/evaluations/edit/{evaluation:id}', [EvaluationsController::class, 'editForm'])->where('evaluation', '[0-9]+')->middleware('auth');
Route::post('/evaluations/edit/{evaluation:id}', [EvaluationsController::class, 'edit'])->where('evaluation', '[0-9]+')->middleware('auth');
Route::get('/evaluations/delete/{evaluation:id}', [EvaluationsController::class, 'delete'])->where('evaluation', '[0-9]+')->middleware('auth');

Route::get('/memes/list', [MemesController::class, 'list'])->middleware('auth');
Route::get('/memes/add', [MemesController::class, 'addForm'])->middleware('auth');
Route::post('/memes/add', [MemesController::class, 'add'])->middleware('auth');
Route::get('/memes/edit/{meme:id}', [MemesController::class, 'editForm'])->where('meme', '[0-9]+')->middleware('auth');
Route::post('/memes/edit/{meme:id}', [MemesController::class, 'edit'])->where('meme', '[0-9]+')->middleware('auth');
Route::get('/memes/delete/{meme:id}', [MemesController::class, 'delete'])->where('meme', '[0-9]+')->middleware('auth');
Route::get('/memes/image/{meme:id}', [MemesController::class, 'imageForm'])->where('meme', '[0-9]+')->middleware('auth');
Route::post('/memes/image/{meme:id}', [MemesController::class, 'image'])->where('meme', '[0-9]+')->middleware('auth');

Route::get('/topics/list', [TopicsController::class, 'list'])->middleware('auth');
Route::get('/topics/add', [TopicsController::class, 'addForm'])->middleware('auth');
Route::post('/topics/add', [TopicsController::class, 'add'])->middleware('auth');
Route::get('/topics/edit/{topic:id}', [TopicsController::class, 'editForm'])->where('topic', '[0-9]+')->middleware('auth');
Route::post('/topics/edit/{topic:id}', [TopicsController::class, 'edit'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/delete/{topic:id}', [TopicsController::class, 'delete'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/image/{topic:id}', [TopicsController::class, 'imageForm'])->where('topic', '[0-9]+')->middleware('auth');
Route::post('/topics/image/{topic:id}', [TopicsController::class, 'image'])->where('topic', '[0-9]+')->middleware('auth');
