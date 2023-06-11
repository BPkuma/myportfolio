<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    use HasFactory;

    //レコードをまるごと新しく更新するメソッド
    public static function addTalks($talks) {       
        //既存の重複レコードを削除 
        Dialogue::whereIn('talk', $talks)->delete();
        //$talksに存在しないレコードを削除        
        Dialogue::whereNotIn('talk', $talks)->delete();

        //$order変数に1を代入
        $order = 1;
        foreach($talks as $talk) {            
            Dialogue::create([
                //orderカラムに$order代入
                'order' => $order,
                //talkカラムに$talk代入
                'talk' => $talk
            ]);
            $order++;
        }
    }    
}
