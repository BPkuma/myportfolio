<x-app-layout>

    <div id="container">
        <div id="progress"></div>
        <div id="answer"></div>
        <div id="question"></div>
    </div>
    <div id="hint"></div>
    <div id="message" class="fadein">エンターを押すと開始します</div>
    <!--data-postsに$postsを格納-->
    <span id="posts" data-posts="{{$posts}}"></span>
    {{-- <script>
        const posts = @json($posts);
    </script> --}}
    <script src="{{ mix('js/AnkiTyping/ankityping.js') }}"></script>

</x-app-layout>
