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
            'ジャスコ「'."\n".$user_name.'さま'."\n"." ".'JavaScriptおさらいのページへようこそ。」', 
            'ジャスコ「'." ".'わたしは'." ".'ジャスコ。'."\n".'伝説の'.$user_name."".'さま'." ".'をお待ちしてました。」',
            'ジャスコ「'." ".'一緒にJavaScriptのおさらいをしていきましょう'." ".'!」'
        ];

        //新しいセリフを追加
        Dialogue::addTalks($talks);        
        
    }
}
