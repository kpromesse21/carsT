<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" onload="f()">
    <div class="min-h-screen bg-gray-100">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Se connecter</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Inscription</a>
                    @endif
                @endauth
            </div>
        @endif

        {{-- detail en carte --}}
        <div class="block sm:flex md:grid-cols-3 ">
            <div class=" block mx-auto md:flex md:mx-[10px] row">
            <div class="card grid-cols-2">
                <img src="" alt="" srcset="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente iusto aspernatur nihil magni
                    corporis, vitae porro maiores voluptate, quos adipisci obcaecati autem atque delectus. Pariatur
                    similique laborum qui doloribus natus.</p>
            </div>
            <div class="card grid-cols-2">
                <img src="" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero modi earum vel soluta cupiditate
                    quibusdam consequuntur asperiores quos, amet sint impedit corrupti dolores aspernatur dignissimos,
                    odit sed facere velit animi?</p>
            </div>
            <div class="card grid-cols-2">
                <img src="" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quibusdam at consectetur aspernatur
                    ipsum quia unde quasi architecto maiores praesentium, illum repellat optio ad molestias harum
                    itaque, voluptate quaerat officiis?</p>
            </div>
            <div class="card grid-cols-2">
                <img src="" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptatem ipsum corrupti assumenda,
                    repudiandae cumque fuga quo laudantium, dolore nam, qui veniam cum nobis sit quas placeat nisi
                    ratione illo!</p>
            </div>
        </div>
        </div>
    </div>
</body>

</html>
