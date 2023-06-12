<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dialogue;
use Illuminate\Support\Facades\Facade;

class DialogueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_name = Facade::getFacadeApplication()->make('auth')->user()->name ?? "ななし"; 
        
        $talks = [
            ['ジャスコ「'."\n".$user_name.'さま'."\n"." ".'JavaScriptおさらいのページへようこそ。」', null], 
            ['ジャスコ「'." ".'わたしは'." ".'ジャスコ。'."\n".'伝説の'.$user_name."".'さま'." ".'をお待ちしてました。」', null],
            ['ジャスコ「'." ".'一緒にJavaScriptのおさらいをしていきましょう'." ".'!」', null],
            ['ジャスコ「うえにあるタイマーが気になりますか？」', 'q'],
            ['ジャスコ「きょうという一日が、あと何時間何分何秒でおわるかを告げてくれる神聖なるタイマー。」', null],
            ['ジャスコ「はるか昔、1970年1月1日から休まずカウントしつづけています。」', null],
            ['ジャスコ「'."\n".$user_name.'さま'."\n"." ".'どうかよびのカウントダウンタイマーをつくってくださいませんか？」',  'q'],
            ['ジャスコ「ありがとうございます！', null],
            ['ジャスコ「！？」', 'slime'],
            ['スライム「オラもてつだってやっからよ。」', null],
            ['ジャスコ「・・・」', null],
            ['スライム「よっしゃがんばっぺ！」', null],
            ['ジャスコ「で、ではタイムスタンプの取得からはじめましょう。」', null],
            ['スライム「？タイムスタンプって何だ？うめぇのか？」', null],
            ['ジャスコ「タイムスタンプとは、1970年1月1日0時0分から数えて何ミリ秒経過したかを表す数値です。」', null],
            ['スライム「・・・！」', null],
            ['ジャスコ「今現在のタイムスタンプと、一日の終わりのタイムスタンプを求めましょう。」', null],
            ['スライム「きゅうにかんじがふえやがった・・・」', null],
            ['ジャスコ「現在の日時を取得します。下のコードをご覧ください。」', 'code'],
        ];

        //新しいセリフを追加
        Dialogue::addTalks($talks);        
        
    }
}
