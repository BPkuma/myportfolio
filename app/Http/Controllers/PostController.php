<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Rules\Hankaku;

class PostController extends Controller
{
    public function showConsole()
    {
        $amount = 5;
        return view('ankityping/ankityping', compact('amount'));
    }

    public function typing(Request $request, $amount)
    {
        $posts = Post::inRandomOrder()->take($amount)->get();
        return view('ankityping.typinggame', compact('posts'));
    }



    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $user = auth()->user();
        // ddd($posts);
        return view('ankityping.questions', compact('posts', 'user'));
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $inputs = $request->validate([
            'answer'=>['required','max:255','string'],
            'question'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);
        $post = new Post();
        $post->answer = $request->answer;
        $post->question = $request->question;
        $post->user_id = auth()->user()->id;
        if(request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images',$name);
            $post->image = $name;
        }
        $post->save();
        return back()->with('message','問題を保存しました');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        return view('ankityping.editquestion', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $inputs=$request->validate([
            'answer'=>'required|max:255',
            'question'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);

        $post->answer=$inputs['answer'];
        $post->question=$inputs['question'];

        if(request('image')){
            $original=request()->file('image')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('image')->move('storage/images', $name);
            $post->image=$name;
        }

        $post->save();

        return redirect()->route('post.index', $post)->with('message', '投稿を更新しました');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('message', '削除しました');
    }
}
