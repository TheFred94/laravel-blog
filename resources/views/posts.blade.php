<title>My Blog</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/app.css">
</head>


<body>

    <!-- Using the @ symbol instead of <?php ?> - Will be compiled into vanilla php  -->

    @foreach ($posts as $post)

    <!-- Using the loop variable which is accessable inside a foreach loop gains access to information about the loop. -->
    {{-- @dd($loop) --}}

    <!-- Using the loop-variable to style on elements -->
    <article class="{{ $loop->even ? 'bg-white' : ''}}">
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