<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    use HasFactory;

    //レコードをまるごと新しく更新するメソッド
    public static function addTalks($talks) {  
        //$talksの０番目だけの値で新しい配列作成
        $talkValues = array_column($talks, 0);     
        //既存の重複レコードを削除 
        Dialogue::whereIn('talk', $talkValues)->delete();
        //$talksに存在しないレコードを削除        
        Dialogue::whereNotIn('talk', $talkValues)->delete();

        //$order変数・$flag変数を初期化
        $order = 1;
        $flag = null;
        foreach($talks as $talk) {            
            Dialogue::create([
                //orderカラムに$order代入
                'order' => $order,
                //talkカラムに$talkの0番目の値代入
                'talk' => $talk[0],
                //flagカラムに$talkの1番目の値代入
                'flag' => $talk[1]
            ]);
            $order++;
        }
    }    
}
