<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'periodo_id',
    ];

    // Relação de muitos para um com Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}