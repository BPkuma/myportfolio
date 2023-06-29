<x-app-layout>

    <div id="container">
        <div id="progress"></div>
        <div id="answer" class="mb-8 font-bolt text-7xl text-green-600 tracking-widest "></div>
        <div id="question"></div>
    </div>
    <div id="hint"></div>
    <div id="message" class="fadein">エンターを押すと開始します</div>

    <!--data-postsに$postsを格納-->
    <span id="posts" data-posts="{{$posts}}"></span>

    <script src="{{ mix('js/AnkiTyping/ankityping.js') }}"></script>

</x-app-layout>
