<x-app-layout>
    <body>
        <a id="top" 
            class="
            no-underline
            ">
        </a>
            <header>    
                <!--ハンバーガー-->
                <button class="hamburger">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </button>
                <!--メインメニュー-->
                <div class="menu">
                    <ul class="menu-list"
                    class="m-0 p-0 flex
                    ">
                        <li><a href="index.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        HOME</a></li>
                        <li><a href="01_countdown/countdown.html"
                            class="
                            no-underline 
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs 
                            block text-gray-900 font-bold text-xl h-12                          
                            ">
                        カウントダウンタイマー</a></li>
                        <li><a href="02_pulldown/pulldown.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">        
                        プルダウンメニュー</a></li>
                        <li><a href="03_cookie/cookie.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        プライバシーポリシー承認パネル</a></li>
                        <li><a href="04_thumb/thumb.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        イメージの切り替え</a></li>
                        <li><a href="05_slide/slide.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        スライドショー</a></li>
                        <li><a href="06_reference/reference.html"
                            class="
                            no-underline
                            inline-block mr-2
                            block text-gray-300 no-underline p-2 text-xs
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        参考資料</a></li>
                    </ul>
                </div>        
            </header>
            <h1 class="
                text-center text-indigo-700
                ">
            JavaScript学んだことまとめ</h1>    
            <div class="container">
                <!--さる（左）-->
                <div class="
                    chat
                    relative flex items-center
                ">
                    <figure class="
                        chat-icon-saru-left
                        relative flex items-center
                        w-16 h-16 flex-shrink-0
                        float-left mr-5
                    ">
                        <img src ="{{ asset('images/saru.png') }}" alt="">
                    </figure>
                    <div class="
                        chat-talk-left
                        relative flex items-center
                    "> 
                        <p>ジャバスクリプトって何？うまいの？</p>
                    </div>
                </div>
                <!--うさ（右）-->
                <div class="
                    chat r
                    relative flex items-center
                    flex-row-reverse
                ">    
                    <figure class="
                        chat-icon-usa-right
                        relative flex items-center
                        w-16 h-16 flex-shrink-0
                        float-right mr-5
                    ">
                        <img src="{{ asset('images/usa.png') }}" alt="">
                    </figure>
                    <div class="
                        chat-talk-right
                        relative flex items-center
                    ">
                        <p>ジャバスクリプトさえあれば生きていけるわ！</p>
                    </div>
                </div>     
                <!--もくじ-->   
                <div class="
                navtitle
                flex
                " >
                    <h2 class="
                        text-teal-400 font-bold text-left w-full justify-between
                        ">
                    Curriculum</h2>
                </div>
                <nav class="
                main_nav
                text-center
                ">
                    <ul class="
                        flex flex-wrap justify-around w-4/5 p-0 list-none
                        flex justify-around list-none
                    ">
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="01_countdown/countdown.html"
                                class="
                                no-underline
                                block text-gray-900 font-bold text-xl h-12
                            ">
                        カウントダウンタイマー
                            </a>
                        </li>
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="02_pulldown/pulldown.html"
                                class="
                                no-underline
                                block text-gray-900 font-bold text-xl h-12
                            ">
                        プルダウンメニュー
                            </a>
                        </li>
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="03_cookie/cookie.html"
                            class="
                            no-underline
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        プライバシーポリシー<br>承認パネル
                            </a>
                        </li>
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="04_thumb/thumb.html"
                            class="
                            no-underline
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        イメージの切り替え
                            </a>
                        </li>
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="05_slide/slide.html"
                            class="
                            no-underline
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        スライドショー
                            </a>
                        </li>
                        <li class="
                            bg-teal-300 h-40 flex items-center
                        ">
                            <a href="06_reference/reference.html"
                            class="
                            no-underline
                            block text-gray-900 font-bold text-xl h-12
                            ">
                        参考資料
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        
            <a href="#top"
                class="
                no-underline
                ">
            ページのトップへ戻る</a>
            <footer>
                <div class="container">
                    <p>&copy; 2023</p>
                </div>
            </footer>
        <script src="jquery-3.6.4.min.js"></script>
        <script src="index.js"></script>
        </body>
        </html>
</x-app-layout>