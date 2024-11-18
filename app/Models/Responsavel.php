<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $table = 'responsaveis';  // Especificando o nome correto da tabela

    // Define os atributos mass assignable
    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];

    // Relação de muitos para muitos com Aluno
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'responsavel_aluno');
    }
}
