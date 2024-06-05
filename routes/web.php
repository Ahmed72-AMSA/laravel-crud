<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

// -> name is a shortcut for uri for routes
Route::get("/posts",[PostController::class,"index"])->name("posts.index");

Route::get("/posts/create",[PostController::class,"create"])->name("posts.create");

Route::post("/posts",function(){
    return "We are in store";
})->name("posts.store");


Route::get("/posts/{post}",[PostController::class,"show"])->name("posts.show");



// Route::get("/test",[TestController::class,'bookAction']);
// Route::get("/greet",[TestController::class,'greetingAction']);
