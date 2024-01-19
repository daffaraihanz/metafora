<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectHistory extends Model
{
    use HasFactory;

    protected $table = 'aspect_histories';

    protected $fillable = [
        'name',
        'color',
        'total_score',
        'id_babs'
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class, 'id_aspects', 'id');
    }
}
