<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestDataHistory extends Model
{
    use HasFactory;

    protected $table = 'user_test_data_histories';

    public function id_registration()
    {
        return $this->belongsTo(Registration::class, 'id_registration', 'id');
    }
}
