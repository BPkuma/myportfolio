<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialogue extends Model
{
    use HasFactory;

    //ホワイトリスト形式で保存可能なカラムを指定
    protected $fillable = ['order', 'dialogue'];

}
