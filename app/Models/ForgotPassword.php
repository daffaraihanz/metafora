<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    use HasFactory;
    protected $table = 'reset_passwords';

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'id_users');
    }
}
