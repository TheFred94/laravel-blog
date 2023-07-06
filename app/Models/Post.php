<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{

    public static function find($slug)
    {
        // Checks if file exists if not throw an exeption. Else return the content of the post
        base_path();
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // Gets the content of the file, chache it and return
        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
    }
}
