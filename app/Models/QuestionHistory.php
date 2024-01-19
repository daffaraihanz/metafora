<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionHistory extends Model
{
    use HasFactory;

    protected $table = 'question_histories';

    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_question', 'id');
    }

    public function sub_aspects()
    {
        return $this->belongsTo(Aspect::class, 'id', 'id_aspects');
    }
}
