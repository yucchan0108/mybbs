<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;


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

Route::get('/', function () {
    return view('posts.newtop');
});

// Route::get('/index', [PostsController::class, 'index'])->middleware(['auth'])->name('top');
// Route::resource('/comments', CommentsController::class, ['only' => ['store']]);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/index', [PostsController::class, 'index'])->name('top');
    Route::resource('/posts', PostsController::class, ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('/comments', CommentsController::class, ['only' => ['store', 'destroy']]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
