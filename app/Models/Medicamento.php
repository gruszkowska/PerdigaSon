<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_inicio',
        'data_final',
        'medicamento',
        'check',
        'pet_id',
        'dosagem',
        'medida'
    ];
}
