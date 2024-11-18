<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnoLetivo extends Model
{
    use HasFactory;

    protected $table = 'anos_letivos';  // Especificando o nome correto da tabela


    protected $fillable = [
        'ano',
    ];

    // Relação de um para muitos com Periodo
    public function periodos()
    {
        return $this->hasMany(Periodo::class);
    }
}