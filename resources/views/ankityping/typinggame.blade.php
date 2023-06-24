<x-app-layout>

    <div id="container">
        <div id="progress"></div>
        <div id="answer"></div>
        <div id="question"></div>
    </div>
    <div id="hint"></div>
    <div id="message" class="fadein">エンターを押すと開始します</div>
    <script>
        const posts = @json($posts);
    </script>
    <script src="{{ asset('js/AnkiTyping/ankityping.js') }}"></script>

</x-app-layout>
