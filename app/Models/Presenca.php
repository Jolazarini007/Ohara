<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function turmaMateria(){
        return $this->belongsTo(TurmaMateria::class, 'turma_materia_id');
    }
}
