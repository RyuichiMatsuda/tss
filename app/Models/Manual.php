<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manual extends Model
{
    use HasFactory;

    use SoftDeletes;


    // new Model($request->all());を使うためのホワイトリスト
    protected $fillable = ['title', 'body',
                            'image_file_name','video_url'];


    // 一覧表示の際の文字数制限
    public function strlength() {
        $str = $this->body;
        $limit = 20;

        if (mb_strlen($str) > $limit ) {
            $str = mb_substr($str, 0, $limit);
            return $str . "...";
        } else {
            return $str;
        }
    }

}
