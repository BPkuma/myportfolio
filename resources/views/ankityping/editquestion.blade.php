<x-app-layout>
    <x-slot name="header">
        <h2 class="text-base text-lime-700 leading-tight">
            内容を編集して「保存する」ボタンを押して下さい
        </h2>
        <x-input-error class="mb-4" :messages="$errors->all()"/>
        <x-message :message="session('message')" />
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:px-8">
            <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                    <label for="answer" class="text-left font-semibold leading-none mt-4">
                        タイピングする文字（半角アルファベットのみ）
                    </label>
                    <input type="text" name="answer" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="answer" value="{{old('answer', $post->answer)}}" placeholder="answer" autofocus>
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="question" class="text-left font-semibold leading-none mt-4">
                        問題文
                    </label>
                    <textarea name="question" class="w-auto py-2 border border-gray-300 rounded-md" id="question" cols="30" rows="3">{{old('question', $post->question)}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="text-left font-semibold leading-none mt-4">
                        画像(1MBまで)
                    </label>
                    @if($post->image)
                        <div>
                            (画像ファイル:{{$post->image}})
                        </div>
                        <img src="{{asset('storage/images/'.$post->image)}}" class="mx-auto" style="height:300px;">
                    @endif
                </div>

                <x-primary-button class="mt-2 mb-2 bg-lime-700">
                    保存する
                </x-primary-button>
            </form>
        </div>
    </div>
    <hr>
</x-app-layout>
