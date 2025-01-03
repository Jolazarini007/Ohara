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
        'turma_id',
        'materia_id',
    ];


    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
    
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
