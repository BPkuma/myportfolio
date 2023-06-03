<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            main {
                width: 314px;
                margin: 15px auto 8px;
                box-shadow: rgb(159, 159, 159) 0 0 8px;
                padding: 1px 12px;
                border-radius: 8px;
                font-family: "游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", sans-serif;
            }
            #main {
                width: 314px;
                height: 38px;
                font-size: 26px;
                color: #ddd;
                background: #026773;
                text-align: center;
                border-radius: 4px;
            }
            .container {
                display: flex;
                gap: 8px;
                width: 315px;
            }
            #sasaki {
                width: 20px;
                overflow-wrap: break-word;
                text-align: center;
            }
            p.member {
                background: #F2E3D5;
                padding: 5px;
                border-radius: 4px;
                width: fit-content;
                text-align: center;
            }
            button {
                all: unset;
                color: #F2E3D5;
                font-size: 19px;
                background: #3CA6A6;
                width: 170px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
                text-align: center;
                padding: 4px 0;
                cursor: pointer;
            }
            button:hover {
                opacity: 0.8;
            }
            button:active {
                opacity: 0.6;
            }
            .member {
                cursor: pointer;
                opacity: 0.4;
            }
            .active {
                opacity: 1;
            }
        </style>
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
</head>
<body class="font-body antialiased">
    {{-- <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}
        <main>
            <p id="main">大桃</p>

            <div class="container">
                <button id="prev">＜</button>
                <button id="next">＞</button>
            </div>

            <div class="container">
                <p class="member active" >大桃</p>
                <p class="member">宮東</p>
                <p class="member" id="sasaki">佐々木</p>
                <p class="member">テル</p>
                <p class="member">畠山</p>
                <p class="member">林</p>
                <p class="member">三浦</p>
                <p class="member">森川</p>
                <p class="member">渡部</p>
            </div>
        </main>
            <script>
            'use strict';
            {
                const member = document.querySelectorAll('.member');
                const main = document.getElementById('main');
                const next = document.getElementById('next');
                const prev = document.getElementById('prev');
                let activeIndex = 0;

                member[0].addEventListener('click', () => {
                activeIndex = 0;
                main.innerHTML = member[0].innerHTML;
                member[0].classList.add('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[1].addEventListener('click', () => {
                activeIndex = 1;
                main.innerHTML = member[1].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.add('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[2].addEventListener('click', () => {
                activeIndex = 2;
                main.innerHTML = member[2].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.add('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[3].addEventListener('click', () => {
                activeIndex = 3;
                main.innerHTML = member[3].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.add('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[4].addEventListener('click', () => {
                activeIndex = 4;
                main.innerHTML = member[4].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.add('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[5].addEventListener('click', () => {
                activeIndex = 5;
                main.innerHTML = member[5].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.add('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[6].addEventListener('click', () => {
                activeIndex = 6;
                main.innerHTML = member[6].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.add('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                });
                member[7].addEventListener('click', () => {
                activeIndex = 7;
                main.innerHTML = member[7].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.add('active');
                member[8].classList.remove('active');
                });
                member[8].addEventListener('click', () => {
                activeIndex = 8;
                main.innerHTML = member[8].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.add('active');
                });

                next.addEventListener('click', () => {
                activeIndex++;
                if (activeIndex > 8) {
                    activeIndex = 0;
                }

                main.innerHTML = member[activeIndex].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                member[activeIndex].classList.add('active');
                });
                prev.addEventListener('click', () => {
                activeIndex--;
                if (activeIndex < 0) {
                    activeIndex = 8;
                }

                main.innerHTML = member[activeIndex].innerHTML;
                member[0].classList.remove('active');
                member[1].classList.remove('active');
                member[2].classList.remove('active');
                member[3].classList.remove('active');
                member[4].classList.remove('active');
                member[5].classList.remove('active');
                member[6].classList.remove('active');
                member[7].classList.remove('active');
                member[8].classList.remove('active');
                member[activeIndex].classList.add('active');
                });
            }
            </script>
        </body>
</html>
