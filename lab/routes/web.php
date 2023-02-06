<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteUri;
use App\Http\Controllers\CommentsController;
use App\Providers\TagsServiceProvider;
use App\Models\user;

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
// Posts Routes

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->Middleware(middleware:'auth');
 // create new post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->Middleware(middleware:'auth');

// store and show  post
Route::group(['middleware' => ['auth']],function(){
    Route::post('/posts', [PostController::class, 'store']);

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});

// edit post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// update post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// delete post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// auth routes
Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// comments routes
Route::post('/comments/{id}', [CommentsController::class, 'store'])->name('comments.store');

Route::DELETE('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');



//github routes
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->user();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

   $user = User::updateOrCreate([
       'github_id' => $githubUser->id,
   ], [
       'name' => $githubUser->name,
       'email' => $githubUser->email,
     
   ]);

   Auth::login($user);
    return redirect('/posts');


});
