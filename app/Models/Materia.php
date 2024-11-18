<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
    ];

    // Relação de muitos para muitos com Professor
    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'professor_materia', 'materia_id', 'professor_id');
    }

    // Relação de muitos para muitos com Turma
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'materia_turma');
    }
}