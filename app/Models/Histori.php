<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $table = 'histories';

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'id_users');
    }

    public function question_packages()
    {
        return $this->hasOne(QuestionPackage::class, 'id', 'id_question_packages');
    }
}
