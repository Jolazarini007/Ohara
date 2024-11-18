<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Use o trait Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Authenticatable
{
    use HasFactory;

    protected $table = 'professores';  // Especificando o nome correto da tabela


    protected $fillable = [
        'nome',
        'telefone',
        'rm',
        'dt_nascimento',
        'dt_contratacao',
        'endereco',
        'status',
        'salario',
        'area_ensino',
        'senha',
    ];

    // Relação de muitos para muitos com Materia, incluindo 'turma_id' na tabela intermediária
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'professor_materia', 'professor_id', 'materia_id')
                    ->withPivot('turma_id');  // Incluindo 'turma_id' como um campo adicional
    }

    // Relação de muitos para muitos com Turma
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'professor_turma');
    }
}