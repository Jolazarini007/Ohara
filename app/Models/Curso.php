<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'periodos',
        'modulos',
    ];

    // Relação de um para muitos com Turma
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    public function materias(){
        return $this->hasMany(Materia::class);
    }
}
