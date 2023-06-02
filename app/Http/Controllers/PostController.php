<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $inputs = $request->validate([
            'answer'=>'required|max:255|regex:/\A([a-zA-Z0-9]{8,})+\z/u',
            'question'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);
        $post = new Post();
        $post->answer = $request->answer;
        $post->question = $request->question;
        $post->user_id = auth()->user()->id;
        $post->save();
        return back()->with('message','問題を保存しました');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
