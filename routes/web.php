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


    // Used for debugging
    // ddd("path");

    // Checks if file exists if not return to homepage
    if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        return redirect("/");
    }

    // Caches the post for 20 minutes
    $post = cache()->remember("posts.{$slug}", now()->addMinutes(20), function () use ($path) {
        var_dump("file_get_contents");

        // If it does exist fetch the content of the file
        return file_get_contents($path);
    });



    // Pass the content of the file to the user/view
    return view("post", [
        "post" => $post
    ]);

    // Using "where" and regular expression to constraint the url endpoint
})->where("post", "[A-z_\-]+");
