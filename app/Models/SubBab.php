<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBab extends Model
{
    use HasFactory;
    protected $table = 'subbabs';

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

    public function bab()
    {
        return $this->belongsTo(Bab::class);;
    }
}
