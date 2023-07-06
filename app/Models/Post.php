<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // A class that gives static access all sorts of functionality
    public static function all()
    {
        $files =  File::files(resource_path("posts/"));

        // Maps over the the array of files and returns an item for each item in the array
        return array_map(
            fn ($file) => $file->getContents(),
            $files
        );
    }

    public static function find($slug)
    {
        // Checks if file exists if not throw an exeption. Else return the content of the post
        base_path();
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // Gets the content of the file, cache it and return
        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
    }
}
