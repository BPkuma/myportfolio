<x-app-layout>
    <x-slot name="header">
        <h2 class="text-left text-base text-lime-700 leading-tight">
            問題文とその答えを入力して「保存する」ボタンを押して下さい
        </h2>
        <x-input-error class="mb-4" :messages="$errors->all()"/>
        <x-message :message="session('message')" />
    </x-slot>
    <div class="text-left max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:px-8">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex items-center mt-2">
                    <div class="w-full flex flex-col">
                    <label for="answaer" class="leading-none mt-4">
                        タイピングする文字（半角英数字のみ）
                    </label>
                    <input type="text" name="answer" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="answwer" value="{{old('answer')}}" placeholder="answer" autofocus>
                    </div>
                </div>


                <div class="w-full flex flex-col">
                    <label for="question" class="leading-none mt-4">
                        問題文
                    </label>
                    <textarea name="question" class="w-auto py-2 border border-gray-300 rounded-md" id="question" cols="30" rows="3">{{old('question')}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="leading-none mt-4">画像ファイル</label>
                        <input id="image" type="file" name="image" class="leading-none block w-full border border-gray-300 rounded-md text-sm hover:bg-gray-300
                        file:bg-transparent file:border-0
                        file:bg-gray-200 file:mr-4 file:py-3 file:px-4">
                </div>

                <x-primary-button class="mt-4 mb-4 bg-lime-700">
                    保存する
                </x-primary-button>
            </form>
        </div>
    </div>
    <hr>
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                    <th scope="col" class="px-6 py-3 text-center text-mb font-normal"></th>
                    <th scope="col" class="px-6 py-3 text-left text-mb font-normal">回答</th>
                    <th scope="col" class="px-6 py-3 text-left text-base font-normal">問題文</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-normal"></th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-normal"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($posts as $post)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-300">
                        <td class="w-2 text-center "><input type="checkbox" @if ($post->is_enabled) checked @endif></td>
                        <td class="text-left px-6 py-4 whitespace-normal text-sm font-medium text-gray-800 dark:text-gray-500">
                            <div>{{$post->answer}}</div>
                        </td>
                        <td class="text-left px-6 py-4 whitespace-normal text-sm text-gray-800 dark:text-gray-500">
                            <div>{{$post->question}}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-800 dark:text-gray-200">
                            <form method="post" action="{{route('post.destroy', $post)}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700"
                                onClick="return confirm('本当に削除しますか？')">
                                    削除
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('post.edit',$post)}}"
                                class="text-blue-500 hover:text-blue-700">
                                @csrf
                                編集
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

                {{$posts->links('vendor.pagination.tailwind2')}}

            </div>
            </div>
        </div>
    </div>

    <script>
        'use strict';
        console.log('hello world');
    </script>
</x-app-layout>
