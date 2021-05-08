<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //テーブル名を決める
    protected $table = 'comments';

    //可変項目
    protected $fillable = 
    [
        'article_id',
        'comment'
    ];
}
