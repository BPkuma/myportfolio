<x-guest-layout>
    <div class="text-5xl text-center mt-6">マイポートフォリオ</div>
    <div class="mt-14 grid grid-cols-3 gap-4 text-xl text-center text-neutral-50 mx-5">
        <a href="{{ url('/fizzbuzz') }}" class="bg-blue-700 rounded-lg p-5 ">FizzBuzzクエスト</a>
        <a href="{{ url('/summarize') }}" class="bg-blue-700 rounded-lg p-5 ">JavaScriptまとめ</a>
        <a href="{{ url('/typing') }}" class="bg-blue-700 rounded-lg p-5 ">AnkiTyping</a>
    </div>
</x-guest-layout>

