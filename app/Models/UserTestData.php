<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestData extends Model
{
    use HasFactory;
    protected $table = 'user_test_datas';
    protected $fillable = [
        'id_answers',
    ];

    public function id_registration()
    {
        return $this->belongsTo(Registration::class, 'id_registration', 'id');
    }
}
