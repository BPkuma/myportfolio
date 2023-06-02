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
        <div class="min-h-screen bg-gray-100">
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
                const data = ;
                const matters = [
                [
                    'alert',
                    'ダイアログに引数指定の文字列を表示する',
                ],
                [
                    'querySelector',
                    '引数にCSSセレクタ形式指定で条件と一致したHTML要素の最初のひとつを返す',
                ],
                [
                    'console.log',
                    'コンソールに引数指定の値を表示する',
                ],
                [
                    'setTimeout',
                    '指定秒数後に引数指定の関数を実行する',
                ],
                [
                    'Math.random',
                    '0以上1未満のランダムな浮動小数を返す',
                ],
                [
                    'Math.floor',
                    '引数指定した数値の小数点以下を切り捨てて返す',
                ],
                [
                    'location.reload',
                    'ページをリロードする',
                ],
                [
                    'location.replace',
                    '指定したページへ移動する',
                ],
                [
                    'location.href',
                    '現在のページのURLを返す',
                ],
                [
                    'length',
                    '文字列の長さを求めるメソッド\n配列の要素数にも応用可能',
                ],
                [
                    'substring',
                    '文字列に対して、引数指定した番号の文字を返すメソッド 負の値を指定すると0番目とみなされる',
                ],
                [
                    'slice',
                    '文字列や配列に対して、引数指定した位置の要素を切り抜くメソッド\n元の文字列からは要素が無くなる',
                ],
                [
                    'getFullYear',
                    '日付オブジェクトの年を4桁の整数で返す',
                ],
                [
                    'toFixed',
                    '数値型の値に対して、引数指定した固定小数点表記の文字列に変換する',
                ],
                [
                    'replace',
                    '文字列に対して、第1引数の文字列を第2引数の文字列に置換するメソッド',
                ],
                [
                    'split',
                    '文字列に対して、引数で指定した区切り文字で分割し、分割された文字列を要素とする配列を生成するメソッド\n引数に空文字を指定することで単語を分解して配列化できる',
                ],
                [
                    'map',
                    '配列に対して、配列の各要素一つずつに引数指定したコールバック関数を実行し、その結果を新しい配列として返すメソッド\n元の配列は非破壊で残るため、メソッドの返り値は何らかの変数に代入する必要がある',
                ],
                    ];
                    let checkTexts = [];
                    let container = document.getElementById('container');
                    let answer = document.getElementById('answer');
                    let question = document.getElementById('question');
                    let hint = document.getElementById('hint');
                    let progParent = document.getElementById('progress');
                    let prog = document.createElement('progress');
                    let message = document.getElementById('message');
                    const amount = 3;
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

                    progParent.appendChild(prog);
                    prog.setAttribute("max", amount);
                    prog.setAttribute("value", count);

                    answer.textContent = '';
                    question.innerText = matter[1];

                    count++;

                    // !..ここが一番のキモ 正解の文字列を分解して表示は＿でもvalueは正解の文字列というspan要素を作ってanswerノードの子要素に設置している
                    checkTexts = matter[0].split('').map(value => {
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
        </div>
    </body>
</html>
