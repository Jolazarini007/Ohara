<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use o trait Authenticatable
use Illuminate\Notifications\Notifiable;

class Professor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'professores';  // Especificando o nome correto da tabela

    protected $guard = 'professor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nome',
        'telefone',
        'rm',
        'dt_nascimento',
        'codigo_etec',
        'dt_contratacao',
        'endereco',
        'salario',
        'foto',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relação de muitos para muitos com Materia, incluindo 'turma_id' na tabela intermediária
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'professor_materia', 'professor_id', 'materia_id');
    }

    // Relação de muitos para muitos com Turma
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'professor_turma', 'professor_id', 'turma_id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
