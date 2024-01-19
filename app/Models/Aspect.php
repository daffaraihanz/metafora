<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    use HasFactory;
    protected $table = 'aspects';

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
