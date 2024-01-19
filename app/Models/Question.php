<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_question', 'id');
    }

    public function sub_aspects()
    {
        return $this->belongsTo(Aspect::class, 'id', 'id_aspects');
    }
}
