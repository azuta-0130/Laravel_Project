<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model // Modelを継承して、Articleクラスを作る
{
    //テーブル名を決める
    protected $table = 'Article'; //テーブルとクラスが紐づく

    //可変項目（保存したい値を決める）
    protected $fillable  = 
    [
        'title',
        'text'
    ];
}
