<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Use o trait Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'rm',
        'codigo_etec',
        'dt_nascimento',
        'senha',
    ];

    // Relação de muitos para muitos com Responsável
    public function responsaveis()
    {
        return $this->belongsToMany(Responsavel::class, 'responsavel_aluno');
    }

    // Relação de muitos para muitos com Turma
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'aluno_turma');
    }
}
