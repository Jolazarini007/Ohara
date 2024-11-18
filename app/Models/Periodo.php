<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ano_letivo_id',
    ];

    // Relação de muitos para um com AnoLetivo
    public function anoLetivo()
    {
        return $this->belongsTo(AnoLetivo::class);
    }

    // Relação de um para muitos com Turma
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}