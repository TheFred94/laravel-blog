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
        // ** Caches the posts forever
        return cache()->rememberForever('posts.all', function () {
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
                ))
                // ** Sorts by date in descending order
                ->sortByDesc('date');
        });
    }
    public static function find($slug)
    {
        // Of all the blog posts, find the one with a slug that matches the one that was requested

        return static::all()->firstWhere('slug', $slug);
    }
}
