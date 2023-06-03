<x-app-layout>



    <div
        class="
        text-7xl text-center mt-6 p-5 text-bold
        font-body md:メイリオ:
        ">
    Anki Typing
    </div>

    <div class="w-2/5 mx-auto mt-6 rounded-2xl bg-gradient-to-r from-lime-500 via-teal-500 to-cyan-500 p-1 shadow-2xl">
        <a class="block rounded-xl bg-white p-4 sm:p-6 lg:p-8 hover:bg-gray-300 transition duration-1000" href="{{ url('/typing/game') }}">
            <div class="mt-2">
                <h3 class="text-xl font-bold text-gray-700 sm:text-xl">
                    アプリで遊ぶ
                </h3>

                <p class="mt-2 text-base text-gray-500">
                    問題文が表示され、伏せられた答えをタイピングします。<br>
                    分からない時はエンターキーで１文字ずつ答えが現れます。
                </p>
            </div>
        </a>
    </div>
    <div class="w-2/5 mx-auto mt-10 rounded-2xl bg-gradient-to-r from-lime-500 via-teal-500 to-cyan-500 p-1 shadow-2xl">
        <a class="block rounded-xl bg-white p-4 sm:p-6 lg:p-8 hover:bg-gray-300 transition duration-1000" href="{{ url('/post') }}">
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
</x-app-layout>
