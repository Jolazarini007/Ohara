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
        'tipo',
        'curso_id'
    ];

    // Relação de muitos para muitos com Aluno
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma', 'turma_id', 'aluno_id');
    }


     public function materias()
    {
        return $this->belongsToMany(Materia::class, 'turma_materia', 'turma_id', 'materia_id');
    } 
/* 
    // Relação com a tabela intermediária (turma_materia)
    public function turmaMaterias()
    {
        return $this->hasMany(TurmaMateria::class);
    } */

/*     // Relação 1:N: uma turma pode ter várias presenças registradas
    public function presencas()
    {
        return $this->hasMany(Presenca::class);
    } */
    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'professor_turma', 'turma_id', 'professor_id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
