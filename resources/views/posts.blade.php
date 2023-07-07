<title>My Blog</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/app.css">
</head>


<body>

    <!-- Using the @ symbol instead of <?php "content" ?> - Will be compiled into vanilla php  -->

    @foreach ($posts as $post)
    <article class="mt-12 pt-12">
        <h1>
            <a class="" href=" /posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <div>
            <!-- Excerpt is not HTMl and can be written like this. It's compiled into vanilla php -->
            {{ $post->excerpt }}
        </div>
    </article>

    @endforeach
</body>