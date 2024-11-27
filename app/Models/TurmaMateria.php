<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TurmaMateria extends Model
{
    protected $table = 'turma_materia';

    public function turma(){
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function materia(){
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}
