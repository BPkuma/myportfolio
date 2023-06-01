<x-guest-layout>
    <div
        class="
        text-7xl text-center mt-6 p-5 text-bold
        font-body md:メイリオ:
        ">
    Anki Typing
    </div>

    <div class="
        mt-14 grid grid-cols-3 gap-4
        text-xl text-center text-neutral-50
        mx-5
        ">
            <a href="{{ url('/fizzbuzz') }}"
                class="
                bg-blue-700 rounded-lg p-5
                hover:bg-blue-500 transition duration-300
                ">
            問題を作る
            </a>
            <a href="{{ url('/summarize') }}"
                class="
                bg-blue-700 rounded-lg p-5
                hover:bg-blue-500 transition duration-300
                ">
            ゲームで遊ぶ
            </a>
            <a href="{{ url('/typing') }}"
                class="
                bg-blue-700 rounded-lg p-5
                hover:bg-blue-500 transition duration-300
                ">
            設定
            </a>

    </div>

</x-guest-layout>
