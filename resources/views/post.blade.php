<title>My Blog</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <article>
        <h1>{!! $post->title !!}</h1>

        <div>
            <!-- Using the exclamation points to treat it as html -->
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Go Back</a>
</body>