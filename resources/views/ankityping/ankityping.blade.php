<x-app-layout>
    <div class="select-none text-7xl text-center mt-6 p-5 text-bold font-body md:メイリオ;">
        Anki Typing
    </div>
<form method="POST" action="{{ route('typing.game', ['amount' => $amount]) }}">
    @csrf
    <div class="w-2/5 mx-auto mt-10 rounded-2xl bg-gradient-to-r
                first-letter: from-lime-500 via-teal-500 to-cyan-500
                p-1 shadow-2xl">
        <button type="submit" class="w-full block text-left rounded-xl bg-white p-4 sm:p-6 lg:p-8 hover:bg-gray-200 transition duration-1000">
            <div class="mt-2">
                <h3 class="text-lg font-bold text-gray-700 sm:text-xl">
                    アプリで遊ぶ
                </h3>
                <p class="mt-2 text-base text-gray-500">
                    問題文が表示され、伏せられた答えをタイピングします。<br>
                    分からない時はエンターキーで１文字ずつ答えが現れます。
                </p>
            </div>
        </button>
    </div>

    <fieldset class="text-center mt-8">
        <legend>ゲームオプション</legend>
        <label>
            出題数(<span id="questionNumber">5</span>)
            <input type="range" name="amount" id="slider" min="5" max="24" value="{{$amount}}">
            </label>
        <label>
            ランダム
            <input type="checkbox" id="numbers-checkbox">
        </label>
        <label>
            ABC順
            <input type="checkbox" id="symbols-checkbox">
        </label>
    </fieldset>
</form>

    <div class="w-2/5 mx-auto mt-10 rounded-2xl bg-gradient-to-r from-lime-500 via-teal-500 to-cyan-500 p-1 shadow-2xl">
        <a class="block rounded-xl bg-white p-4 sm:p-6 lg:p-8 text-left hover:bg-gray-200 transition duration-1000" href="{{ url('/post') }}">
            <div class="mt-2">
                <h3 class="text-lg font-bold text-gray-700 sm:text-xl">
                    問題を作る
                </h3>

                <p class="mt-2 text-base text-gray-500">
                    問題文とその答えを自分で作り登録してください。<br>
                    アプリではその中から出題されます。<br>
                    答えには半角英数字にのみ対応しています。
                </p>
            </div>
        </a>
    </div>

    <script>
        'use strict';
        {
            const amount = document.getElementById('questionNumber');
            const slider = document.getElementById('slider');

            amount.textContent = slider.value;
        }

    </script>
</x-app-layout>
