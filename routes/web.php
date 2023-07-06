<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

// Post Route variable from post view using the slug variable
Route::get("posts/{post}", function ($slug) {

    // The path to the post
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // Send user back to homepage if file doesn't exist
    if (!file_exists($path)) {
        return redirect("/");
    }

    // The post variable
    $post = file_get_contents($path);

    return view("post", [
        "post" => $post
    ]);
});
