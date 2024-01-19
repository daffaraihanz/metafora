<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPackage extends Model
{
    use HasFactory;
    protected $table = 'question_packages';

    protected $fillable = [
        'name',
        'price',
        'timer',
        'flag'
    ];

    public function aspects()
    {
        return $this->hasMany(QuestionPackage::class, 'id', 'id_question_package');
    }
}
