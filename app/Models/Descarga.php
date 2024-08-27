<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Descarga extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function placa()
    {
        return $this->belongsTo(Placa::class, 'placa_id');
    }

    protected $fillable = ['id', 'unidade', 'placa_id', 'hora_inicio','hora_fim' ,'data'];

    protected $dates = ['deleted_at'];
}
