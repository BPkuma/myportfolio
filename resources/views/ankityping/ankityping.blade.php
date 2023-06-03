<x-app-layout>
    <div
        class="
        text-7xl text-center mt-6 p-5 text-bold
        font-body md:メイリオ:
        ">
    Anki Typing
    </div>

    <div class="
        mt-6 grid grid-cols-3 gap-4
        text-xl text-center text-neutral-50
        mx-5
        ">
            <a href="{{ url('/post') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-1000
                ">
            問題を作る
            </a>
            <a href="{{ url('/typing/game') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-1000
                ">
            ゲームで遊ぶ
            </a>
            <a href="{{ url('/typing') }}"
                class="
                bg-lime-700 rounded-lg p-5
                hover:bg-lime-500 transition duration-1000
                ">
            設定
            </a>

</x-app-layout>
