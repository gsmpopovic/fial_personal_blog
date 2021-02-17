<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// MAIL ROUTES //

Route::post('/processMail', [App\Http\Controllers\MailController::class, 'sendFIALMail'])->name('mail');
// APP ROUTES // 

Route:: get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('/'); 
Route:: get('/contact', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact'); 
Route:: get('/about', [App\Http\Controllers\IndexController::class, 'about'])->name('about'); 


// Route::post('/blog/search/{query_string}', [App\Http\Controllers\SearchController::class, 'searchPosts'])->name('search');
Route::get('/blog/search', [App\Http\Controllers\SearchController::class, 'searchPosts'])->name('search');
// Route::get('/blog/search/{query_string}', ['uses' => 'DisplayController@index', 'as' => 'sd']); 
Route::get('/blog/search/{query_string}', [App\Http\Controllers\DisplayController::class, 'index'])->name('sd');



// Get all published posts
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'getPosts'])->name("blog");
 
// Get posts for a given tag
Route::get('tag/{slug}', [App\Http\Controllers\BlogController::class, 'getPostsByTag'])->name('postsbytag');

 
// Get posts for a given topic
Route::get('topic/{slug}', [App\Http\Controllers\BlogController::class, 'getPostsByTopic']);

 
// Find a single post
Route::middleware('Canvas\Http\Middleware\Session')->get('{slug}', [App\Http\Controllers\BlogController::class, 'findPostBySlug']);

// Route::middleware('Canvas\Http\Middleware\Session')->get('{slug}', 'BlogController@findPostBySlug');


// AUTH ROUTES // 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// CANVAS ROUTES // 

Route::prefix('canvas-ui')->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('posts', [\App\Http\Controllers\CanvasUiController::class, 'getPosts']);
        Route::get('posts/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showPost'])
             ->middleware('Canvas\Http\Middleware\Session');

        Route::get('tags', [\App\Http\Controllers\CanvasUiController::class, 'getTags']);
        Route::get('tags/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTag']);
        Route::get('tags/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTag']);

        Route::get('topics', [\App\Http\Controllers\CanvasUiController::class, 'getTopics']);
        Route::get('topics/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTopic']);
        Route::get('topics/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTopic']);

        Route::get('users/{id}', [\App\Http\Controllers\CanvasUiController::class, 'showUser']);
        Route::get('users/{id}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForUser']);
    });

    Route::get('/{view?}', [\App\Http\Controllers\CanvasUiController::class, 'index'])
         ->where('view', '(.*)')
         ->name('canvas-ui');
});
