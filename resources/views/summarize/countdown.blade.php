<x-app-layout>    
    <slot>
        <!-- カウントダウンタイマーのページ -->
        <div class="bg-black h-screen text-white">            
            <!--あしあと-->
            <div class="pt-2 float-right">         
                <div class="footprints corner p-4 border-2 border-white w-6/12 ml-5"> 
                    <div>
                        <h2>あしあと&nbsp;&nbsp;&nbsp;&nbsp;<span id="open">▼</span></h2>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="#section1">タイムスタンプにして引き算</a></li>
                            <li><a href="#section2">引き算した結果を時、分、秒に計算しなおす</a></li>
                            <li><a href="#section3">テンプレートリテラルでテキストを作成する</a></li>
                            <li><a href="#section4">htmlを書き換える</a></li>
                            <li><a href="#section5">別の表示方法</a></li>
                            <li><a href="../06_reference/reference.html">参考資料</a></li>
                        </ul>
                    </nav>
                </div>                
            </div>
            <!-- カウントダウンタイマー・サンプル表示 -->
            <div class="pt-24">           
                <div class="corner p-4 border-2 border-white w-6/12 ml-5">                
                    <div class>
                        <p><span id="today"></span>は
                        </p>
                        <p>あと<span id="timer"></span> で終わります。
                        </p> 
                    </div>
                </div>
            </div>
            <!--画像エリア-->
            <div class="img_box">
                <!--ジャスコの画像-->
                <div class="mt-5 images flex-shrink-0">
                    <img class="jasco w-1/5" src="{{ asset('image_jasco/jasco01.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco02.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco03.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco04.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco05.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco06.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco07.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco08.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco09.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco10.png') }}" alt="ジャスコ">
                    <img class="jasco w-1/5 hidden" src="{{ asset('image_jasco/jasco11.png') }}" alt="ジャスコ">
                </div>
                <!--スライムの画像-->
                <div class="mt-5 images flex-shrink-0">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime01.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime02.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime03.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime04.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime05.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime06.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime07.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime08.png') }}" alt="スライム">
                    <img class="slime w-1/5 hidden" src="{{ asset('image_slime/slime09.png') }}" alt="スライム">                
                </div>
            </div>
            <!--ジャスコセリフ-->
            <!--data-dialogues属性にJSON形式にエンコードしたdialoguesを設定-->
            <div id="dialogues" data-dialogues="{{ json_encode($dialogues) }}">                                    
                <div class="corner p-4 border-2 border-white w-6/12 ml-5 h-40 cursor-pointer">                        
                @foreach($dialogues as $dialogue)       
                        <!--Dialoguesテーブルからセリフ取得-->                       
                        <p id="talk"></p>
                @endforeach   
                      <br><span class="confirm cursor-pointer flex justify-center">▼</span>
                </div>                     
            </div>
            <!--はいorいいえ-->
            <div class="yesno absolute top-50 hidden">
                <div class="corner p-4 border-2 border-white w-6/12 ml-5">
                    <div class="yes cursor-pointer"><span id="yesno_choose1">▶</span>はい</div>
                    <div class="no cursor-pointer"><span id="yesno_choose2" class="hidden">▶</span>いいえ</div>
                </div>
            </div>

<!--code_nowコードはじまり-->
<div class="pt-20 code_now hidden">           
    <pre><code class="language-JavaScript">
    //現在の日時を取得
    const now = new Date();
    //タイムスタンプを取得＆コンソールに出力
    console.log(now.getTime());
    
    //出力結果：1683768506024
    </code></pre>
</div>
<!--code_nowコードここまで-->       
<!--code_goalコードはじまり-->
<div class="pt-20 code_goal hidden">           
    <pre><code class="language-JavaScript">
    //現在の日時を取得                   
    const goal = new Date();
    //今日の終わりの時刻を設定
    goal.setHours(23);  
    goal.setMinutes(59);
    goal.setSeconds(59);    
    //コンソールに出力
    console.log(goal);

    //出力結果：Thu May 11 2023 23:59:59 GMT+0900 (日本標準時)

    //タイムスタンプを取得＆コンソールに出力
    console.log(goal.getTime());

    //出力結果：1683817199360
    </code></pre>
</div>
<!--code_goalコードここまで-->
<!--code_subtractionコードはじまり-->
<div class="pt-20 code_subtraction hidden">           
    <pre><code class="language-JavaScript">
    //タイムスタンプにした一日の終わりマイナス現在
    const diff = goal.getTime() - now.getTime();    
    //コンソールに出力
    console.log(deff);
    
    //出力結果：46048000
    </code></pre>
</div>
<!--code_subtractionコードここまで-->      
<!--code_hmsコードはじまり-->
<div class="pt-20 code_hms hidden">           
    <pre><code class="language-JavaScript">
    //秒、分、時、日を計算
    const sec = Math.floor(diff / 1000) % 60;            
    const min = Math.floor(diff / 1000 / 60) % 60;       
    const hours = Math.floor(diff / 1000 / 60 / 60) % 24;
    //日は必ず0になるはずだが、念のため計算する
    const days = Math.floor(diff / 1000 / 60 / 60 / 24);
    
    //配列に格納し、中身を見てみる
    const count = [days, hours, min, sec];
    console.log(count);

    //出力結果：(4) [0, 7, 0, 36]
    </code></pre>
</div>
<!--code_hmsコードここまで-->   
<!--code_countdownコードはじまり-->
<div class="pt-20 code_countdown hidden">           
    <pre><code class="language-JavaScript">
    'use strict';

    //計算して結果を配列で返すcountdDown()関数を作る    
    function countDown(due) {
        //現在の日時
        const now = new Date();
        //未来-現在
        const diff = due.getTime() - now.getTime();
        //秒、分、時、日を計算
        const sec = Math.floor(rest / 1000) % 60;
        const min = Math.floor(rest / 1000 / 60) % 60;
        const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
        const days = Math.floor(rest / 1000 / 60 / 60 / 24);
        //配列に格納し、定数countに代入
        const count = [days, hours, min, sec];
        //戻り値をcountに
        return count;                         
    } 
    //今日の終わりの時刻を設定
    const goal = new Date();
    goal.setHours(23);
    goal.setMinutes(59);
    goal.setSeconds(59);
    
    //countDown()関数の呼び出し
    countDown(goal);                
    </code></pre>
</div>
<!--code_countdownコードここまで-->    
<!--code_backquoteコードはじまり-->
<div class="pt-20 code_backquote hidden">           
    <pre><code class="language-JavaScript">
    //呼び出した関数を定数counterに代入
    const counter = countDown(goal);
    
    //counterから値を1つずつ取り出し、テンプレートリテラルでテキストを作る＆コンソールに出力
    console.log(`${counter[1]}時間${counter[2]}分${counter[3]}秒`);
    
    //出力結果：<span class="marker">3時間52分32秒</span>
    </code></pre>
</div>
<!--code_backquoteコードここまで--> 
<!--code_htmlコードはじまり-->
<div class="pt-20 code_html hidden">
    <pre><code class="language-html">
    &lt;p&gt;残り時間&gt;&lt;span id="timer">&lt;/span&gt;&lt;/p&gt;
    </code></pre>
</div>
<!--code_htmlコードここまで-->
<!--code_rewriteコードはじまり-->
<div class="pt-20 code_rewrite hidden">
    <pre><code class="language-JavaScript">
    //テンプレートリテラルで作ったテキストを定数timeに代入
    const time = `${counter[1]}時間${counter[2]}分${counter[3]}秒`;
    
    //id#timerで取得したhtmlに定数timeを代入
    document.getElementById('timer').textContent = time;
    </code></pre>
</div>
<!--code_rewriteコードここまで-->

<!--解説中にサンプル表示1-->
<div class="sample mt-5 text-center hidden">
    <p>残り時間<span id="sample_timer"></span></p>    
</div>

<!--code_recalcコードはじまり-->
<div class="pt-20 code_recalc hidden">
    <pre><code class="language-JavaScript">
    //まとめてrecalc()にする
    function recalc() {
    const counter = countDown(goal);
    const time = `${counter[1]}時間${counter[2]}分${counter[3]}秒`;
    document.getElementById('timer').textContent = time;    
    }    

    //recalc()を1秒ごとに繰り返し実行
    setInterval(recalc, 1000);
    </code></pre>
</div>
<!--code_recalcコードここまで-->

<!--解説中にサンプル表示2-->
<div class="sample2 mt-5 text-center hidden">
    <p>残り時間<span id="sample_timer2"></span></p>    
</div>

<!--code_padstartコードはじまり-->
<div class="pt-20 code_padstart hidden">
    <pre><code class="language-JavaScript">
    //まとめてrecalc()にする
    function recalc() {
    const counter = countDown(goal);

    //String()とpadStart()を追加
    const time = `${counter[1]}時間${counter[2]}分${String(counter[3]).padStart(2, '0')}秒`;
    document.getElementById('timer').textContent = time;    
    }    

    //recalc()を1秒ごとに繰り返し実行
    setInterval(recalc, 1000);
    </code></pre>
</div>
<!--code_padstartコードここまで-->

<!--解説中にサンプル表示3-->
<div class="sample3 mt-5 text-center hidden">
    <p>残り時間<span id="sample_timer3"></span></p>    
</div>
  

            
        </div>
    </slot>
</x-app-layout>