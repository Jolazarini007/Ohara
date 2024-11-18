<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_turma_id',
        'professor_turma_materia_id',
        'data',
        'assunto',
    ];

    // Relação com AlunoTurma
    public function alunoTurma()
    {
        return $this->belongsTo(AlunoTurma::class);
    }

    // Relação com ProfessorMateria
    public function professorMateria()
    {
        return $this->belongsTo(ProfessorMateria::class);
    }
}