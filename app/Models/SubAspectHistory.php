<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAspectHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sub_aspect_histories';

    protected $fillable = [
        'name',
        'id_registrations',
        'id_aspects'
    ];
}
