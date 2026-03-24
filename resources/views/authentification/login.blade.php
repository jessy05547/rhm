<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/login.css', 'resources/js/app.js','resources/js/chunking.js','resources/js/controlChamp.js', 'resources/css/style.css'])
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>