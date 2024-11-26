<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use o trait Authenticatable
use Illuminate\Notifications\Notifiable;

class Gestor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'gestores';  // Especificando o nome correto da tabela

    protected $guard = 'gestor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'rm',
        'codigo_etec',
        'rg',
        'cpf',
        'nome',
        'telefone',
        'dt_nascimento',
        'endereco',
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

}
