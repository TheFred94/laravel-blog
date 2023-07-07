<!-- A layout file that controls the layout for a page to declare the html once, instead of declaring it in every single view-->

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

    <!-- Any of the contents from the view are slottet here-->
    {{ $slot }}
</body>