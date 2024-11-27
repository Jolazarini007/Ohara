<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use o trait Authenticatable
use Illuminate\Notifications\Notifiable;

class Aluno extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'aluno';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'rm',
        'codigo_etec',
        'nome',
        'telefone',
        'dt_nascimento',
/*         'curso',
        'modulo',
        'turma', */
        'password',
        'foto'
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

    // Relação de muitos para muitos com Responsável
    public function responsaveis()
    {
        return $this->belongsToMany(Responsavel::class, 'responsavel_aluno');
    }

    // Relação de muitos para muitos com Turma
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'aluno_turma', 'aluno_id', 'turma_id');
    }

    public function presencas(){
        return $this->hasMany(Presenca::class);
    }
}
