<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'curso_id',
        'periodo_id',
    ];

    // Relação de muitos para muitos com Aluno
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma');
    }

    // Relação de um para muitos com Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relação de um para muitos com Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    // Relação de muitos para muitos com Professor
    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'professor_turma');
    }
}