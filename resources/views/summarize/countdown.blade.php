<x-app-layout>    
    <slot>
        <!-- カウントダウンタイマーのページ -->
        <div class="bg-black h-screen text-white">
            <!--もくじ-->
            <div class="pt-2 float-right">         
                <div id="state_data" class="corner p-4 border-2 border-white w-6/12 ml-5"> 
                    <div>
                        <h2>もくじ&nbsp;&nbsp;&nbsp;&nbsp;<span id="open">▼</span></h2>
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
                <div id="state_data" class="corner p-4 border-2 border-white w-6/12 ml-5">                
                    <div class>
                        <p><span id="today"></span>は
                        </p>
                        <p>あと<span id="timer"></span> で終わります。
                            <br><span class="flex justify-center">▼</span>
                        </p> 
                    </div>
                </div>
            </div>

            <!--ジャスコの画像-->
            <div class="mt-5">
                <img  class="w-1/12" src="{{ asset('images/jasco.png') }}" alt="ジャスコ">
            </div>

            <!--ジャスコセリフ-->
            <div class="pt-5">           
                <div id="state_data" class="corner p-4 border-2 border-white w-6/12 ml-5">                
                    <div class>
                        <p>
                            こんにちわ、ジャスコです。
                            <br><span class="flex justify-center">▼</span>
                        </p>
                         
                    </div>
                </div>
            </div>
            
        </div>
    </slot>
</x-app-layout>