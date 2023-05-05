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
    <style>
        body {
            margin: 0;
            font-family: 'Roboto';
            font-size: 16px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
        }

        .carousel {
            padding: 20px;
            perspective: 500px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .carousel>* {
            flex: 0 0 auto;
        }

        .carousel figure {
            margin: 0;
            width: 400px;
            transform-style: preserve-3d;
            transition: transform 0.5s;
            transform-origin: 50% 50% -482.8427124746px;
        }

        .carousel figure img {
            width: 100%;
            box-sizing: border-box;
            padding: 0 40px;
            opacity: 0.9;
        }

        .carousel figure img:not(:first-of-type) {
            position: absolute;
            left: 0;
            top: 0;
            transform-origin: 50% 50% -482.8427124746px;
        }

        .carousel figure img:nth-child(2) {
            transform: rotateY(0.7853981634rad);
        }

        .carousel figure img:nth-child(3) {
            transform: rotateY(1.5707963268rad);
        }

        .carousel figure img:nth-child(4) {
            transform: rotateY(2.3561944902rad);
        }

        .carousel figure img:nth-child(5) {
            transform: rotateY(3.1415926536rad);
        }

        .carousel figure img:nth-child(6) {
            transform: rotateY(3.926990817rad);
        }

        .carousel figure img:nth-child(7) {
            transform: rotateY(4.7123889804rad);
        }

        .carousel figure img:nth-child(8) {
            transform: rotateY(5.4977871438rad);
        }

        .carousel nav {
            display: flex;
            justify-content: center;
            margin: 20px 0 0;
        }

        .carousel nav button {
            flex: 0 0 auto;
            margin: 0 5px;
            cursor: pointer;
            color: #333;
            background: none;
            border: 1px solid;
            letter-spacing: 1px;
            padding: 5px 10px;
        }
    </style>
</head>

<body class="font-sans antialiased" onload="f()">
    <div class="min-h-screen bg-gray-100">
        {{-- menu --}}
        <div class="fixed top-0  px-6 py-4 sm:block menu-welcome">
            {{-- logo --}}
            {{-- <h1 class="text-xl">CARS-T</h1> --}}
            <div class=" justify-items-end ">
                @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-700 dark:text-gray-500  bg-slate-900 px-5 rounded-md text-slate-300 text-lg hover:bg-slate-700">Se
                        connecter</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm text-gray-700 dark:text-gray-500  bg-slate-900 px-5 rounded-md text-slate-300 text-lg hover:bg-slate-700">Inscription</a>
                    @endif
                @endauth

            @endif
            </div>
            
        </div>


        {{-- carouselle --}}
        <div>
            <div class="carousel" style="margin-top: 50px">
                <figure>
                    <img src="https://source.unsplash.com/EbuaKnSm8Zw/800x533" alt="">
                    <img src="https://source.unsplash.com/kG38b7CFzTY/800x533" alt="">
                    <img src="https://source.unsplash.com/nvzvOPQW0gc/800x533" alt="">
                    <img src="https://source.unsplash.com/2lYHiNtjSwg/800x533" alt="">
                    <img src="https://source.unsplash.com/CjS3QsRuxnE/800x533" alt="">
                    <img src="https://source.unsplash.com/xxeAftHHq6E/800x533" alt="">
                    <img src="https://source.unsplash.com/bjhrzvzZeq4/800x533" alt="">
                    <img src="https://source.unsplash.com/7mUXaBBrhoA/800x533" alt="">
                </figure>
                <nav>
                    <button class="nav prev">Prev</button>
                    <button class="nav next">Next</button>
                </nav>
            </div>
        </div>
        {{-- detail en carte --}}
        <div class="block sm:flex md:grid-cols-3 ">
            <div class=" block mx-auto md:flex md:mx-[10px] row space-x-4">
                <div class="card grid-cols-2">
                    <img src="" alt="" srcset="">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente iusto aspernatur nihil magni
                        corporis, vitae porro maiores voluptate, quos adipisci obcaecati autem atque delectus. Pariatur
                        similique laborum qui doloribus natus.</p>
                </div>
                <div class="card grid-cols-2">
                    <img src="" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero modi earum vel soluta cupiditate
                        quibusdam consequuntur asperiores quos, amet sint impedit corrupti dolores aspernatur
                        dignissimos,
                        odit sed facere velit animi?</p>
                </div>
                <div class="card grid-cols-2">
                    <img src="" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quibusdam at consectetur
                        aspernatur
                        ipsum quia unde quasi architecto maiores praesentium, illum repellat optio ad molestias harum
                        itaque, voluptate quaerat officiis?</p>
                </div>
                <div class="card grid-cols-2">
                    <img src="" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptatem ipsum corrupti
                        assumenda,
                        repudiandae cumque fuga quo laudantium, dolore nam, qui veniam cum nobis sit quas placeat nisi
                        ratione illo!</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var
        carousel = document.querySelector('.carousel'),
        figure = carousel.querySelector('figure'),
        nav = carousel.querySelector('nav'),
        numImages = figure.childElementCount,
        theta = 2 * Math.PI / numImages,
        currImage = 0;

    nav.addEventListener('click', onClick, true);

    function onClick(e) {
        e.stopPropagation();

        var t = e.target;
        if (t.tagName.toUpperCase() != 'BUTTON')
            return;

        if (t.classList.contains('next')) {
            currImage++;
        } else {
            currImage--;
        }

        figure.style.transform = `rotateY(${currImage * -theta}rad)`;
    }
</script>

</html>
