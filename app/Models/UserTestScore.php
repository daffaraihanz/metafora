<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestScore extends Model
{
    use HasFactory;
    protected $table = 'user_test_scores';

    protected $fillable = [
        'total_score',
    ];

    public function aspects()
    {
        return $this->belongsTo(Aspect::class, 'id_aspects', 'id');
    }
}
