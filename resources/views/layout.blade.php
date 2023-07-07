<!-- A layout file that controls the layout for a page to declare the html once, instead of declaring it in every single view-->

<!-- New CSS or JS files would also be added here -->

<!-- #1 Create the layout file. -->
<!-- #2 yeild the content like down below (can be named anything)-->
<!-- #3 Create a section for the content with the decided name in the view file-->


<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/app.css">
</head>
<title>My Blog</title>

<body>
    <header>
        @yield('banner')
    </header>

    <!-- Any of the contents from the view are yeilded here-->
    @yield('content')
</body>