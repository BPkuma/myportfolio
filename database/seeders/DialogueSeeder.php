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

        //seederを実行するたびに、既存のデータを削除する
        Dialogue::truncate();
        
        Dialogue::create([
            'order' => 1,
            'dialogue' => 'ジャスコ「'."\n".$user_name.'さま'."\n"." ".'JavaScriptおさらいのページへようこそ。」'
        ]);
        Dialogue::create([
            'order' => 2,
            'dialogue' => 'ジャスコ「'." ".'わたしは'." ".'ジャスコ。'."\n".'伝説の'.$user_name."".'さま'." ".'をお待ちしてました。」'
        ]);
        Dialogue::create([
            'order' => 3,
            'dialogue' => 'ジャスコ「'." ".'一緒にJavaScriptのおさらいをしていきましょう'." ".'!」'
        ]);
    }
}
