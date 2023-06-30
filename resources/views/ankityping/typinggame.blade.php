<x-app-layout>

    <div id="container">
        <div id="progress"></div>
        <div id="answer"
            class="mb-8 font-bolt text-7xl
                text-green-600 tracking-widest ">
        </div>
        <div id="question"
            class="text-2xl text-left mx-10 p-5 rounded-md">
        </div>
    </div>
    <div id="hint"
        class="text-2xl text-left bg-gray-200
        rounded-md mx-10 my-5 p-5 opacity-0">
    </div>
    <div id="message"
        class="fadein">
        エンターを押すと開始します
    </div>

    <!--data-postsに$postsを格納-->
    <span id="posts" data-posts="{{$posts}}"></span>

</x-app-layout>
