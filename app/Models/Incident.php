<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

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
