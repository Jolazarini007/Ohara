<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Curso;
use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GestorCursoController extends Controller
{

    // Exibe todos os cursos
    public function index()
    {
        $cursos = Curso::all(); // Pega todos os cursos do banco de dados
        return view('gestao.cursos.index', compact('cursos'));
    }

    /**
     * Exibe a view de cadastro de Cursos.
     */
    public function create()
    {
        return view('gestao.cursos.adicionar'); // Certifique-se de que o nome da sua view seja "cursos.create".
    }

    /**
     * Armazena os dados de um novo curso no banco.
     */
    public function store(Request $request)
    {
        // Validar os dados
        $validated = $request->validate([
            'nome' => 'required|string|max:35|min:8',
            'descricao' => 'required|string',
            'modulos' => 'required|integer|min:1',
            'periodos' => 'required|array|min:1', // Array de períodos
            'periodos.*' => 'in:manha,tarde,noite', // Valores válidos
            'materias' => 'required|string', // Materias devem ser uma string
        ]);

        // Criar o curso
        $curso = Curso::create([
            'nome' => $validated['nome'],
            'descricao' => $validated['descricao'],
            'modulos' => $validated['modulos'],
            'periodos' => json_encode($validated['periodos']), // Salvar períodos como JSON
        ]);

        // Explodir a string de matérias e salvar individualmente
        $materias = explode(',', $validated['materias']); // Divide a string por vírgula
        foreach ($materias as $materia) {
            $curso->materias()->create([
                'nome' => trim($materia), // Remove espaços extras
            ]);
        }

        // Redirecionar com sucesso
        return redirect()->route('gestao.cursos.adicionar')->with('success', 'Curso cadastrado com sucesso!');
    }



    // Exibe o formulário de edição do curso
    public function edit($id)
    {
        $curso = Curso::findOrFail($id); // Encontra o curso pelo ID
        return view('gestao.cursos.edit', compact('curso'));
    }

    // Atualiza os dados do curso no banco de dados
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:35|min:8',
            'descricao' => 'required|string',
            'modulos' => 'required|integer|min:1',
            'periodos' => 'required|array|min:1',
            'periodos.*' => 'in:manha,tarde,noite',
            'materias' => 'required|string', // Matérias serão uma string separada por vírgula
        ]);

        // Encontra o curso
        $curso = Curso::findOrFail($id);

        // Atualiza os dados do curso
        $curso->update([
            'nome' => $validated['nome'],
            'descricao' => $validated['descricao'],
            'modulos' => $validated['modulos'],
            'periodos' => json_encode($validated['periodos']),
        ]);

        // Atualiza as matérias
        $curso->materias()->delete(); // Apaga as matérias antigas
        $materias = explode(',', $validated['materias']);
        foreach ($materias as $materia) {
            $curso->materias()->create([
                'nome' => trim($materia), // Remove espaços extras
            ]);
        }

        return redirect()->route('gestao.cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }
}
