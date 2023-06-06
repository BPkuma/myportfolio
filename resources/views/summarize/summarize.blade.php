<x-app-layout>
   <!-- <slot> -->
    <!-- タイトル -->
    <div class="bg-black h-screen text-white">
        <h1 class="text-center font-medium text-7xl pt-5">
            JavaScript<br>
            <span class="text-5xl">
            おさらい
            </span>
        </h1>
        
        <!-- 選択肢/ステータス -->
        <div>
            <!-- 選択肢 -->
            <ul class="corner p-4 border-2 border-white w-6/12 mt-5 ml-5">
                <li id="summarize" class="text-white cursor-pointer">
                    <span id="choose1">▶</span>
                    &nbsp;&nbsp;<a href="countdown">おさらいする</a>
                </li>
                <li id="state" class="text-white cursor-pointer">
                    <span id="choose2" class="hidden">▶</span>
                    &nbsp;&nbsp;ステータスをかくにんする
                </li>
                <li id="run" class="text-white cursor-pointer">
                    <span id="choose3" class="hidden">▶</span>
                    &nbsp;&nbsp;にげる
                </li>
            </ul>
            <!-- ステータス -->
            <div id="state_data" class="corner p-4 border-2 border-white w-6/12 mt-5 ml-5 hidden">                
                <p>
                ななし
                </p>
                <p>
                レベル　0
                </p>
            </div>
            <!-- 逃げたとき -->
            <div id="run_data" class="corner p-4 border-2 border-white w-6/12 mt-5 ml-5 hidden">                
                <p>
                しかし、まわりこまれた！！！
                </p>                
            </div>
        </div>
    </div>
   <!-- </slot> --> 
</x-app-layout>