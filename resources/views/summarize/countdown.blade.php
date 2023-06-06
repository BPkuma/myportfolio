<x-app-layout>    
    <slot>
        <!-- カウントダウンタイマー -->
        <div class="bg-black h-screen text-white">            
            <!-- サンプル -->
            <div id="state_data" class="corner p-4 border-2 border-white w-6/12 ml-5">                
                <div class="sample">
                    <p class="today"><span id="today"></span>は、
                    </p>
                    <p class="timer">あと <i class="fa-solid fa-bomb"></i></i><span id="timer2"></span> で終わります。
                    </p> 
                </div>
            </div>           
        </div>
    </slot>
</x-app-layout>