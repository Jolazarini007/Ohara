<?php

namespace App\Http\Controllers\Gestor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Professor;

class GestorProfessorController extends Controller
{
    /**
     * Exibe a view de cadastro de aluno.
     */
    public function create()
    {
        return view('gestao.adicionarProfessor'); // Certifique-se de que o nome da sua view seja "professor.create".
    }

    /**
     * Armazena os dados de um novo aluno no banco.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'rm' => 'required|string|max:20|unique:professores,rm',
            'rg' => 'required|string|max:20|unique:professores,rg',
            'cpf' => 'required|string|max:14|unique:professores,cpf',
            'codigo_etec' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'dt_nascimento' => 'required|date',
            'endereco' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validação para a foto
        ]);

            // Verifica se a foto foi enviada
    $fotoBlob = null;
    if ($request->hasFile('photo')) {
        try {
            // Abre o arquivo e lê o conteúdo em binário
            $fotoBlob = file_get_contents($request->file('photo')->getRealPath());

            // Verifique se a foto foi lida corretamente
            if ($fotoBlob === false) {
                throw new \Exception("Erro ao ler a foto.");
            }

            // Debug: Verificando o conteúdo da foto (em binário)
            Log::info("Foto carregada: ", ['size' => strlen($fotoBlob)]);

        } catch (\Exception $e) {
            Log::error("Erro ao processar a foto: " . $e->getMessage());
            return redirect()->route('alunos.create')->with('error', 'Erro ao processar a foto.');
        }
    } else {
        // Foto não fornecida
        Log::info("Nenhuma foto fornecida.");
    }

        // Criação do professor
        $professor = new Professor();
        $professor->rm = $validatedData['rm'];
        $professor->rg = $validatedData['rg'];
        $professor->cpf = $validatedData['cpf'];
        $professor->codigo_etec = $validatedData['codigo_etec'];
        $professor->nome = $validatedData['nome'];
        $professor->telefone = $validatedData['telefone'];
        $professor->dt_nascimento = $validatedData['dt_nascimento'];
        $professor->endereco = $validatedData['endereco'];
        $professor->foto = $fotoBlob; // Armazena a foto como um BLOB
        $professor->password = bcrypt($validatedData['cpf']); // Armazena a senha como o cpf da pessoa
        $professor->save();

        // Redireciona com mensagem de sucesso
        return redirect()->route('gestao.adicionarProfessorview')->with('success', 'Professor cadastrado com sucesso!');
    }
}
