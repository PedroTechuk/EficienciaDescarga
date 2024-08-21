<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'unidade', 'placa_id', 'hora_inicio','hora_fim' ,'data'];
}
