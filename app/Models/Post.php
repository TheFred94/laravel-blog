<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

        // Find all of the the files in the post collection and map over them
        return collect(File::files(resource_path("posts")))

            // ** Maps over each item and for each item parse that file into a document
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))

            // ** Maps over the collection of documents and build the post object
            ->map(fn ($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                // Why is body a function here?
                $document->body(),
                $document->slug,
            ));
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
