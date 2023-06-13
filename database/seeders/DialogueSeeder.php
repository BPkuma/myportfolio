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
            ['ジャスコ「'."\n".$user_name.'さま'."\n"." ".'どうか、よびのカウントダウンタイマーをつくってくださいませんか？」',  'q'],
            ['ジャスコ「ありがとうございます！」', null],
            ['ジャスコ「！？」', 'slime'],
            ['スライム「オラもてつだってやっからよ。」', null],
            ['ジャスコ「・・・」', null],
            ['スライム「よっしゃがんばっぺ！」', null],
            ['ジャスコ「で、ではタイムスタンプの取得からはじめましょう。」', null],
            ['スライム「タイムスタンプって何だ？うめぇのか？」', null],
            ['ジャスコ「タイムスタンプとは、1970年1月1日0時0分から数えて何ミリ秒経過したかを表す数値です。」', null],
            ['スライム「・・・！」', null],
            ['ジャスコ「今現在のタイムスタンプと、一日の終わりのタイムスタンプを求めましょう。」', null],
            ['スライム「きゅ、きゅうにかんじがふえた・・・」', null],
            ['ジャスコ「まずは現在の日時を取得します。下のコードをご覧ください。」', 'code_now'],
            ['ジャスコ「Dateオブジェクトをインスタンス化し、定数nowに代入します。」', null],
            ['ジャスコ「getTime()メソッドを使うと、タイムスタンプが取得できます。」', null],
            ['スライム「いぎなし新キャラが2人も登場だっぺ・・・」', null],
            ['ジャスコ「console.logで確認すると、今現在のタイムスタンプが出力されます。」', null],
            ['ジャスコ「次は、一日の終わりのタイムスタンプを求めましょう。」', 'code_goal'],
            ['ジャスコ「Dateオブジェクトをインスタンス化し、定数goalに代入します。」', null],
            ['ジャスコ「Dateオブジェクトをインスタンス化し、定数goalに代入します。」', null],
            ['ジャスコ「setHours()メソッドは時、setMinutes()は分、setSeconds()は秒をセットすることができます。」', null],            
            ['ジャスコ「console.logで確認すると、今日の終わりの時間が出力されます。」', null],
            ['スライム「な、なにしゃべってんだこのおなごは・・・」', null],
            ['ジャスコ「あとは先ほどと同じように、gettime()メソッドでタイムスタンプが取得できます。」', null],
            ['スライム「タイム・・・スタ・・・」', null],
            ['ジャスコ「次に、これらを引き算し、定数diffに代入します。」', 'code_subtraction'],
            ['ジャスコ「console.logで確認すると、今日の残り時間がミリ秒で確認できます。」', null],
            ['スライム「ひ・・・ひき・・・ざん」', null],
            ['ジャスコ「ミリ秒を時、分、秒に直します。」', 'code_hms'],
            ['ジャスコ「ミリ秒を1000で割り、60で割った余りをMath.floorで切り捨てると、秒が求められます。」', null],
            ['ジャスコ「ミリ秒を1000で割り、60で割り、さらに60で割った余りをMath.floorで切り捨てると、分が求められます。」', null],
            ['ジャスコ「ミリ秒を1000で割り、60で割り、さらに60で割り、24で割った余りをMath.floorで切り捨てると、時が求められます。」', null],
            ['ジャスコ「ミリ秒を1000で割り、60で割り、さらに60で割り、24で割った数をMath.floorで切り捨てると、日が求められます。」', null],
            ['ジャスコ「定数secに秒を代入、定数minに分を代入、定数hoursに時を代入、定数daysに日を代入します。」', null],
            ['ジャスコ「定数countに配列として代入し、console.logで中身を確認してみましょう。」', null],
            ['スライム「あわわわわ・・・」', null],
            ['ジャスコ「本日の残りが、0日と7時間0分36秒ということがわかりましたね！」', null],
            ['スライム「・・・」', null],
            ['ジャスコ「これらの計算をまとめてファンクションにします。」', 'code_countdown'],
            ["ジャスコ「JavaScriptファイルにコードを書くときは、'use strict'と書いておくと安心です。」", null],
            ["ジャスコ「functionと書くと、ファンクションを定義できます。引数には任意にセットした未来時間が入る予定です。」", null],
            ["ジャスコ「Dateオブジェクトをインスタンス化し、定数nowに代入。」", null],
            ["ジャスコ「引数に入る未来時間のタイムスタンプから現在のタイムスタンプを引き算し、結果を定数diffに代入。」", null],
            ["ジャスコ「秒、分、時、日を計算し、各定数に代入。」", null],
            ["ジャスコ「日、時、分、秒を定数countに代入。」", null],
            ["ジャスコ「戻り値を定数countとし、メソッドは完成です！」", null],
            ["ジャスコ「countDownファンクションの引数に入れる未来時間を設定します。」", null],
            ["ジャスコ「Dateオブジェクトをインスタンス化し、定数goalに代入。」", null],
            ["ジャスコ「setHours()メソッドで時間をセット、setMinutes()メソッドで分をセット、setSeconds()で秒をセット。」", null],
            ["ジャスコ「countDown()ファンクションを呼び出し、引数に定数goalをセットします。」", null],
        ];

        //新しいセリフを追加
        Dialogue::addTalks($talks);        
        
    }
}
