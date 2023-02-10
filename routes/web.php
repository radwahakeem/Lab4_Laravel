<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;


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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => ['auth']],function(){
    Route::get('/posts', [PostController::class, 'index'])->name(name:'posts.index');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name(name:'posts.edit');
    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name(name:'posts.destroy');
    Route::get('/posts/restore' , [PostController::class, 'restore'])->name('posts.restore');
    Route::get('/posts/create',[PostController::class,'create'])->name(name:'posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name(name:'posts.show');
    Route::post('/posts',[PostController::class,'store'])->name(name:'posts.store');
    Route::put('/posts/{post}',[PostController::class,'update'])->name(name:'posts.update');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
 
    // $user->token
});



