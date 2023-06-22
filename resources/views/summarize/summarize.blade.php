<x-app-layout>
    <slot>
        <!-- タイトル -->
        <div class="bg-black h-screen text-white">
            <div class="container">
                <h1 class="text-center font-medium text-7xl">
                    JavaScript<br>
                    <span class="text-5xl">
                    おさらい
                    </span>
                </h1>
                <!-- 選択肢/ステータス -->
                <div class="menu">
                    <!-- 選択肢 -->
                    <ul class="corner p-4 border-2 border-white">
                        <li id="summarize" class="text-white cursor-pointer">
                            <span id="choose1">▶</span>
                            &nbsp;&nbsp;<a href="countdown">おさらい&nbsp;をはじめる
                            </a>
                        </li>                
                        <li id="state" class="text-white cursor-pointer">
                            <span id="choose2" class="hidden">▶</span>
                            &nbsp;&nbsp;ステータス&nbsp;をかくにんする
                        </li>
                        <li id="run" class="text-white cursor-pointer">
                            <span id="choose3" class="hidden">▶</span>
                            &nbsp;&nbsp;にげる
                        </li>
                        <li id="reference" class="text-white cursor-pointer">
                            <span id="choose4" class="hidden">▶</span>
                            &nbsp;&nbsp;<a href="#">さんこう&nbsp;しりょう
                            </a>
                        </li>
                    </ul>
                    <!-- ステータス -->
                    <div id="state_data" class="corner p-4 border-2 border-white mt-5 hidden">                
                        <p>
                        {{Auth::user()->name ?? "ななし"}}
                        </p>
                        <p>
                        レベル&nbsp;0
                        </p>
                    </div>
                    <!-- 逃げたとき -->
                    <div id="run_data" class="corner p-4 border-2 border-white mt-5 hidden">                
                        <p>
                        しかし、まわりこまれた！！！
                        </p>                
                    </div>
                    <!--さんこうしりょう-->
                    <div id="reference_data" class="corner p-4 border-2 border-white mt-5 hidden">                
                        <ul>
                            <li>書籍名:確かな力が身につく JavaScript「超入門」</li>
                            <li>著者:狩野祐東</li>
                            <li>出版年:2019年</li>
                        </ul>           
                    </div>
                </div>
            </div>
        </div>
    </slot>
</x-app-layout>