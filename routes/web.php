<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;


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
    $files =  File::files(resource_path("posts"));
    $posts = [];

    foreach ($files as $file) {
        $document = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug,
        );
    }

    // ddd($posts);

    // Returns all the posts to the view
    return view('posts', [
        'posts' => $posts
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
