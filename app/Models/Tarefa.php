<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_entrega',
        'professor_id',
        'turma_materia_id',
    ];


    public function turmaMateria()
    {
        return $this->belongsTo(TurmaMateria::class, 'turma_materia_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }
}
