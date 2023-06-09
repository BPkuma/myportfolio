<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    use HasFactory;

    //新しいレコードをまとめて追加するメソッド
    public static function addTalks($talks) {
        $existingTalks = Dialogue::whereIn('talk', $talks)->get();
        foreach($existingTalks as $existingTalk) {
            $existingTalk->delete();
        }
        Dialogue::whereNotIn('talk', $talks)->delete();

        $max_order = Dialogue::max('order');
        foreach($talks as $talk) {
            $max_order++;
            Dialogue::create([
                'order' => $max_order,
                'talk' => $talk
            ]);
        }
    }

    //新しいレコードを挿入する際、orderを振りなおすメソッド
    /* public static function insertTalkAtOrder($talk, $order) {
        $max_order = self::max('order');
        $order = min($max_order + 1 , $order);
        self::where('order', '>=', $order)->increment('order');
        self::create([
            'order' => $order,
            'talk' => $talk
        ]);  
    } */
    //レコードを削除する際、orderを振りなおすメソッド
    /* public static function deleteTalkAtOrder($order) {
        self::where('order', $order)->delete();
        self::where('order', '>', $order)->decrement('order');
    } */

    //既存のレコードを更新するメソッド
    /* public static function updateTalkAtOrder($order, $talk) {
        self::where('order', $order)->update(['talk' => $talk]);
    } */
}
