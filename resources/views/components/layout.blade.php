<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>


    <title>MasterChester</title>

</head>

<body class="bg-[#FEFAE0] p-[20px]">

    <nav class="flex justify-center text-xl gap-16 items-center mb-5">
        <a href="/cozinheiro" class="relative cursor-pointer no-underline text-[#9CA986] after:absolute after:left-0 after:bottom-[-5px] after:w-0 after:h-0.5 after:bg-[#bec9af] hover:after:w-full after:transition-all after:duration-300">
            Cozinheiros
        </a>

        <h1 class="text-[#9CA986] text-center text-5xl">
            Master<span class="text-[#CCD5AE]">Chester</span>
        </h1>

        <a href="/menu" class="relative cursor-pointer no-underline text-[#9CA986] after:absolute after:left-0 after:bottom-[-5px] after:w-0 after:h-0.5 after:bg-[#bec9af] hover:after:w-full after:transition-all after:duration-300">
            Menus
        </a>
    </nav>


{{ $slot }}



</body>
