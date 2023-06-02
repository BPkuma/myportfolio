<x-guest-layout>
    <div
        class="
        text-7xl text-center mt-6 p-5 font-bold
        tracking-tight bg-gradient-to-r from-blue-200 via-blue-600
        to-blue-900 bg-clip-text text-transparent
        ">
    My Port Folio
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
        FizzBuzzクエスト
        </a>
        <a href="{{ url('/summarize') }}"
            class="
            bg-blue-700 rounded-lg p-5
            hover:bg-blue-500 transition duration-300
            ">
        JavaScriptまとめ
        </a>
        <a href="{{ url('/typing') }}"
            class="
            bg-blue-700 rounded-lg p-5
            hover:bg-blue-500 transition duration-300
            ">
        Ankiタイピング
        </a>
        <a href="{{ url('/typing') }}"
            class="
            bg-blue-700 rounded-lg p-5
            hover:bg-blue-500 transition duration-300
            ">
        こんな漢字
        </a>
        <a href="{{ url('/typing') }}"
            class="
            bg-gray-700 rounded-lg p-5
            hover:bg-gray-500 transition duration-300
            ">
        準備中...
        </a>
        <a href="{{ url('/typing') }}"
            class="
            bg-gray-700 rounded-lg p-5
            hover:bg-gray-500 transition duration-300
            ">
        準備中...
        </a>
    </div>

</x-guest-layout>
