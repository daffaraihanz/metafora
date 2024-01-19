<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_aspects', 'score', 'id_question'];

    public function user_test_datas()
    {
        return $this->belongsTo(UserTestData::class, 'id', 'id_answers');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_question', 'id');
    }

    public function aspects()
    {
        return $this->belongsTo(Aspect::class, 'id_aspects', 'id');
    }
}
