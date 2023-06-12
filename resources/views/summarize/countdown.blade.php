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
                <div class="mt-5 images">
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
                <div class="mt-5 images">
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
                <div class="corner p-4 border-2 border-white w-6/12 ml-5">                        
                @foreach($dialogues as $dialogue)       
                        <!--Dialoguesテーブルからセリフ取得-->                       
                        <p id="talk"></p>
                @endforeach   
                      <br><span class="confirm flex justify-center cursor-pointer">▼</span>
                </div>                     
            </div>
            <!--はいorいいえ-->
            <div class="yesno absolute top-50 hidden">
                <div class="corner p-4 border-2 border-white w-6/12 ml-5">
                    <div class="yes"><span id="yesno_choose1">▶</span>はい</div>
                    <div class="no"><span id="yesno_choose2">▶</span>いいえ</div>
                </div>
            </div>

            
            
        </div>
    </slot>
</x-app-layout>