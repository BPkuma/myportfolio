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
            body {
            margin-top: 10px;
            text-align: center;
            color: #63847a;
            user-select: none;
            }

            /* 正解文字列に変わる時のアニメーション */
            span {
            transition: all 300ms 0s ease;
            }

            #answer {
            margin-bottom: 30px;
            font-size: 70px;
            font-weight: bold;
            color: #40987e;
            letter-spacing: .1em;
            }

            #question {
            font-size: 24px;
            text-align: left;
            margin: 0 40px;
            padding: 20px 20px;
            border-radius: 10px;
            }

            #hint {
            font-size: 24px;
            text-align: left;
            margin: 20px 40px 20px;
            padding: 20px 20px;
            background-color: lightgray;
            border-radius: 10px;
            opacity: 0;
            }

            #message {
            font-size: 24px;
            background: rgba(211, 211, 211, 0.429);
            border-radius: 10px;
            padding: 20px;
            margin: 0 40px;
            }

            /* "_"から正解文字列に変わったあとのプロパティ  */
            .add-correct {
            font-size: 0.6em;
            color: #1b463a;
            opacity: .3;
            }

            /* 間違えたときのアニメーション */
            .caution {
            display: inline-block;
            animation: buruburu .15s ;
            color: red;
            }
            @keyframes buruburu {
            0%{transform: translate(0px, 0px) rotatez(0deg);}
            20%{transform: translate(2px, 4px) rotatez(3deg);}
            40%{transform: translate(-2px, 2px) rotatez(-3deg);}
            60%{transform: translate(2px, 4px) rotatez(3deg);}
            80%{transform: translate(-2px, 6px) rotatez(-3deg);}
            100%{transform: translate(0px, 0px) rotatez(0deg);}
            }

            /* 要素をフワッと表示させる */
            .fadein {
            opacity: 0;
            animation: fadein .7s ease forwards;
            }
            @keyframes fadein {
            100% { opacity: 1;}
            }

            #progress {
            margin: 0 40px;
            }
            progress {
            appearance: none;
            -webkit-appearance: none;
            margin-top: 40px;
            width: 100%;
            height: 7px;
            }
            progress::-webkit-progress-bar {
            background-color: lightgray;
            border-radius: 10px;
            }
            progress::-webkit-progress-value {
            background-color: #40987e;
            border-radius: 10px;
            }

            #container {
            opacity: 0;
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-body antialiased">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
        <main>
            <div id="container">
                <div id="progress"></div>
                <div id="answer"></div>
                <div id="question"></div>
            </div>
            <div id="hint"></div>
            <div id="message" class="fadein">エンターを押すと開始します</div>
            <script>
                'use strict';
                {
                const matters = {!! json_encode($posts) !!};
                console.log(matters);
                let checkTexts = [];
                let container = document.getElementById('container');
                let answer = document.getElementById('answer');
                let question = document.getElementById('question');
                let hint = document.getElementById('hint');
                let progParent = document.getElementById('progress');
                let prog = document.createElement('progress');
                let message = document.getElementById('message');
                const amount = matters.length;
                let hit = 0;
                let count = 0;
                let state = false;
                let startTime;

                function correctAnswer (e) {
                checkTexts[0].span.textContent = checkTexts[0].value;
                checkTexts[0].span.className = 'add-correct';
                hit++;
                checkTexts.shift();
                }

                function createText() {
                let rand = Math.floor(Math.random() * matters.length);
                let matter = matters.splice(rand, 1)[0];
                console.log(matter);
                progParent.appendChild(prog);
                prog.setAttribute("max", amount);
                prog.setAttribute("value", count);

                answer.textContent = '';
                question.innerText = matter.question;

                count++;

                // !..ここが一番のキモ 正解の文字列を分解して表示は＿でもvalueは正解の文字列というspan要素を作ってanswerノードの子要素に設置している
                checkTexts = matter.answer.split('').map(value => {
                    let span = document.createElement('span');
                    span.textContent = '_';
                    answer.appendChild(span);
                    return {span, value: value};
                    });

                    hint.textContent = `最初の文字は ${checkTexts[0].value}`;
                    setTimeout(() => {
                    hint.classList.add('fadein')
                }, 4000);
                hint.classList.remove('fadein');
                }

                document.addEventListener('keydown', (e) => {
                if(e.code === 'Enter') {
                    if(state === true) {
                    correctAnswer(e);

                    if(!checkTexts.length ){
                        if(count >= amount) {
                        const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(2); // 経過時間を計算して小数点2位の文字列に変換
                        const wpm = hit / elapsedTime * 60 // wpmを計算

                        setTimeout(() => {
                            answer.remove();
                            question.remove();
                            hint.remove();
                            message.style.display = "";
                            message.style.marginTop = "50px";
                            message.innerText = `-------- RESULT --------\n回答数 : ${amount} 問\n入力文字数 : ${hit}\n経過時間 : ${elapsedTime} 秒\nWPM : ${wpm.toFixed(2)}\n\nエンターを押すと開始画面に移動します`;
                        }, 400);

                        document.addEventListener('keypress', e => {
                            if(e.code === 'Enter') {
                            window.location.reload();
                            }
                        });
                        }
                        setTimeout(() => {
                        hint.classList.remove('fadein');
                        prog.remove();
                        container.classList.add('fadein');
                        createText();
                        }, 400);
                    }
                    return;
                    }
                    state = true;
                    startTime = Date.now();
                    question.style.background = "lightgray";
                    message.textContent = "";
                    message.style.display = "none";
                    container.classList.add('fadein');
                    createText();
                }

                // ユーザーの入力値(e.key)が正しいものではなかったら、文字を震わせるアニメーションclassをつけて、150ミリ秒後に外す
                if(checkTexts[0].value !== e.key) {
                    checkTexts[0].span.classList.add('caution');
                    setTimeout(() => {checkTexts[0].span.classList.remove('caution')},150);
                    return;
                }
                if(checkTexts[0].value === e.key) {
                    correctAnswer(e);

                    //配列要素が空っぽになったら400ミリ秒後に次の問題を出す
                    if(!checkTexts.length ){
                    if(count >= amount) {
                        const elapsedTime = ((Date.now() - startTime) / 1000).toFixed(2); // 経過時間を計算して小数点2位の文字列に変換
                        const wpm = hit / elapsedTime * 60 // wpmを計算

                        setTimeout(() => {
                        answer.remove();
                        question.remove();
                        hint.remove();
                        message.style.display = "";
                        message.style.marginTop = "50px";
                        message.innerText = `-------- RESULT --------\n回答数 : ${amount} 問\n入力文字数 : ${hit}\n経過時間 : ${elapsedTime} 秒\nWPM : ${wpm.toFixed(2)}\n\nエンターを押すと開始画面に移動します`;
                        }, 400);

                        document.addEventListener('keypress', e => {
                        if(e.code === 'Enter') {
                            window.location.reload();
                        }
                        });
                    }
                    setTimeout(() => {
                        hint.classList.remove('fadein');
                        prog.remove();
                        container.classList.add('fadein');
                        createText();
                    }, 400);
                    }
                }
                });
            }
            </script>
        </main>
    </body>
</html>
