<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', function () {

    // Returns all the posts to the view
    return view('posts', [
        'posts' => Post::all()
    ]);
});

// Post Route variable from post view using the slug variable
Route::get("posts/{post}", function ($slug) {
    // Find a post by its slug and pass it to a view called "post"
    return view("post", [
        'post' => Post::find($slug)
    ]);
    // Used for debugging
    // ddd("path");

})->where("post", "[A-z_\-]+");
