<?php

namespace App\Http\Controllers\Gestor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Materia;

class GestorMateriaController extends Controller
{
    /**
     * Exibe a view de cadastro de matérias.
     */
    public function create()
    {
        return view('gestao.adicionarMateria'); // Certifique-se de que o nome da sua view seja "materia.create".
    }

    /**
     * Armazena os dados de uma nova materia no banco.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([

            'nome' => 'required|string|max:255|unique:materias,nome',
            'descricao' => 'required|string|max:255',

        ]);


        // Criação da matéria
        $materia = new Materia();
        $materia->nome = $validatedData['nome'];
        $materia->descricao = $validatedData['descricao'];

        $materia->save();

        // Redireciona com mensagem de sucesso
        return redirect()->route('gestao.adicionarMateriaview')->with('success', 'Matéria cadastrada com sucesso!');
    }
}
