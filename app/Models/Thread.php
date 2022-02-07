<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;


    // #スレッド：リレーション

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function incident()
    {
      return $this->belongsTo(Incident::class);
    }
}
