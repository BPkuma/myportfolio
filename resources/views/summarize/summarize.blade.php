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
                    <ul class="menu-list">
                        <li><a href="index.html"
                            class="
                            no-underline
                            ">
                        HOME</a></li>
                        <li><a href="01_countdown/countdown.html"
                            class="
                            no-underline                            
                            ">
                        カウントダウンタイマー</a></li>
                        <li><a href="02_pulldown/pulldown.html"
                            class="
                            no-underline
                            ">        
                        プルダウンメニュー</a></li>
                        <li><a href="03_cookie/cookie.html"
                            class="
                            no-underline
                            ">
                        プライバシーポリシー承認パネル</a></li>
                        <li><a href="04_thumb/thumb.html"
                            class="
                            no-underline
                            ">
                        イメージの切り替え</a></li>
                        <li><a href="05_slide/slide.html"
                            class="
                            no-underline
                            ">
                        スライドショー</a></li>
                        <li><a href="06_reference/reference.html"
                            class="
                            no-underline
                            ">
                        参考資料</a></li>
                    </ul>
                </div>        
            </header>
            <h1>JavaScript学んだことまとめ</h1>    
            <div class="container">
                <!--さる（左）-->
                <div class="chat">
                    <figure class="chat-icon-saru-left">
                        <img src="icon/study_animal_saru.png" alt="">
                    </figure>
                    <div class="chat-talk-left"> 
                        <p>ジャバスクリプトって何？うまいの？</p>
                    </div>
                </div>
                <!--うさ（右）-->
                <div class="chat r">    
                    <figure class="chat-icon-usa-right">
                        <img src="icon/eto_usagi_head.png" alt="">
                    </figure>
                    <div class="chat-talk-right">
                        <p>ジャバスクリプトさえあれば生きていけるわ！</p>
                    </div>
                </div>     
                <!--もくじ-->   
                <div class="navtitle">
                    <h2>Curriculum</h2>
                </div>
                <nav class="main_nav">
                    <ul>
                        <li><a href="01_countdown/countdown.html"
                            class="
                            no-underline
                            ">
                        カウントダウンタイマー</a></li>
                        <li><a href="02_pulldown/pulldown.html"
                            class="
                            no-underline
                            ">
                        プルダウンメニュー</a></li>
                        <li><a href="03_cookie/cookie.html"
                            class="
                            no-underline
                            ">
                        プライバシーポリシー<br>承認パネル</a></li>
                        <li><a href="04_thumb/thumb.html"
                            class="
                            no-underline
                            ">
                        イメージの切り替え</a></li>
                        <li><a href="05_slide/slide.html"
                            class="
                            no-underline
                            ">
                        スライドショー</a></li>
                        <li><a href="06_reference/reference.html"
                            class="
                            no-underline
                            ">
                        参考資料</a></li>
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