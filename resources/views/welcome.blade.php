<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel')</title>

    <link rel="stylesheet" href="../css/app.css">

    <style>

        body {
            background-color: #FEFAE0;
        }

    </style>

</head>
<body>

    <x-nav-menu/>



</body>
</html>
