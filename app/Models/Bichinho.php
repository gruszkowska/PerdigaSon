<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bichinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet',
        'especie',
        'raca',
        'idade_ano',
        'idade_mes',
        'guardiao_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
