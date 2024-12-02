<?php

namespace App\Http\Controllers\Gestor;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Turma;

class GestorAlunoController extends Controller
{
    /**
     * Exibe a view de cadastro de aluno.
     */
    public function create()
    {
        $turmas = Turma::all();

        return view('gestao.adicionarAluno', compact('turmas')); // Certifique-se de que o nome da sua view seja "alunos.create".
    }

    /**
     * Armazena os dados de um novo aluno no banco.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'rm' => 'required|string|max:20|unique:alunos,rm',
            'rg' => 'required|string|max:20|unique:alunos,rg',
            'cpf' => 'required|string|max:14|unique:alunos,cpf',
            'codigo_etec' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'turmas' => 'required|exists:turmas,id', // Valida que a turma selecionada existe
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

        // Criação do aluno
        $aluno = new Aluno();
        $aluno->rm = $validatedData['rm'];
        $aluno->rg = $validatedData['rg'];
        $aluno->cpf = $validatedData['cpf'];
        $aluno->codigo_etec = $validatedData['codigo_etec'];
        $aluno->nome = $validatedData['nome'];
        $aluno->telefone = $validatedData['telefone'];
        $aluno->dt_nascimento = $validatedData['dt_nascimento'];
        $aluno->endereco = $validatedData['endereco'];
        $aluno->foto = $fotoBlob; // Armazena a foto como um BLOB
        $aluno->password = bcrypt($validatedData['cpf']); // Armazena a senha como o cpf da pessoa
        $aluno->save();

        // Associando o aluno a várias turmas
        if (isset($validatedData['turmas'])) {
            $aluno->turmas()->attach($validatedData['turmas']);
        }

        // Redireciona com mensagem de sucesso
        return redirect()->route('gestao.adicionarAlunoview')->with('success', 'Aluno cadastrado com sucesso!');
    }
}
