<?php

// use App\Http\Controllers\ProfileController;
use App\Models\Gestor;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuthenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Aluno\AlunoInfoController;
use App\Http\Controllers\Aluno\AlunoTarefaController;
use App\Http\Controllers\Gestor\GestorAlunoController;
use App\Http\Controllers\Gestor\GestorCursoController;
use App\Http\Controllers\Gestor\GestorTurmaController;
use App\Http\Controllers\Gestor\GestorMateriaController;
use App\Http\Controllers\Aluno\Auth\AlunoLoginController;
use App\Http\Controllers\Gestor\GestorProfessorController;
use App\Http\Controllers\Gestor\Auth\GestorLoginController;
use App\Http\Controllers\Professor\ProfessorInfoController;
use App\Http\Controllers\Professor\ProfessorTurmaController;
use App\Http\Controllers\Professor\Auth\ProfessorLoginController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::prefix('professor')->middleware([RedirectIfAuthenticated::class . ':professor'])->group(function () {
    Route::get('login', [ProfessorLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class . ':professor')->name('professor.login');
    Route::post('login', [ProfessorLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class . ':professor')->name('professor.login');
});

Route::prefix('gestao')->middleware([RedirectIfAuthenticated::class . ':gestor'])->group(function () {
    Route::get('login', [GestorLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class . ':gestor')->name('gestao.login');
    Route::post('login', [GestorLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class . ':gestor')->name('gestao.login');
});

Route::prefix('aluno')->middleware([RedirectIfAuthenticated::class . ':aluno'])->group(function () {
    Route::get('login', [AlunoLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class . ':aluno')->name('aluno.login');
    Route::post('login', [AlunoLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class . ':aluno')->name('aluno.login');
});

Route::prefix('gestao')->middleware([CustomAuthenticate::class . ':gestor'])->group(function () {
    Route::get('home', fn() => view('gestao.home'))->name('gestao.home');

    Route::get('adicionar-professores', [GestorProfessorController::class, 'create'])->name('gestao.adicionarProfessorview');
    Route::post('adicionar-professores', [GestorProfessorController::class, 'store'])->name('gestao.adicionarProfessor');

    Route::get('adicionar-alunos', [GestorAlunoController::class, 'create'])->name('gestao.adicionarAlunoview');
    Route::post('adicionar-alunos', [GestorAlunoController::class, 'store'])->name('gestao.adicionarAluno');

    Route::get('adicionar-materias', [GestorMateriaController::class, 'create'])->name('gestao.adicionarMateriaview');
     Route::get('adicionar-turmas', [GestorTurmaController::class, 'create'])->name('gestao.adicionarTurmaview');
    Route::get('turmas/{id}/edit', [GestorTurmaController::class, 'edit'])->name('gestao.editarTurmaview');
    Route::get('turmas', [GestorTurmaController::class, 'index'])->name('gestao.turmasIndex');
    Route::post('adicionar-turmas', [GestorTurmaController::class, 'store'])->name('gestao.adicionarTurma');
    Route::post('adicionar-materias', [GestorMateriaController::class, 'store'])->name('gestao.adicionarMateria');
    Route::put('editar-turmas/{id}', [GestorTurmaController::class, 'update'])->name('gestao.editarTurma'); 

    Route::get('/cursos/adicionar', [GestorCursoController::class, 'create'])->name('gestao.cursos.create');
    Route::post('/cursos/adicionar', [GestorCursoController::class, 'store'])->name('gestao.cursos.adicionar');
    Route::get('/cursos', [GestorCursoController::class, 'index'])->name('gestao.cursos.index'); // Rota para listar os cursos
    Route::get('/cursos/{id}/edit', [GestorCursoController::class, 'edit'])->name('gestao.cursos.edit'); // Rota para editar um curso
    Route::put('/cursos/{id}', [GestorCursoController::class, 'update'])->name('gestao.cursos.update'); // Rota para atualizar o curso

    Route::get('/cursos/turma/{id}/adicionar', [GestorTurmaController::class, 'create'])->name('gestao.turmas.create');
    Route::post('/cursos/turma/adicionar', [GestorCursoController::class, 'store'])->name('gestao.turmas.store');


    Route::post('logout', [GestorLoginController::class, 'destroy'])->name('gestao.logout');
});


Route::prefix('professor')->middleware([CustomAuthenticate::class . ':professor'])->group(function () {
    Route::post('logout', [ProfessorLoginController::class, 'destroy'])->name('professor.logout');
    Route::get('home', [ProfessorInfoController::class, 'home'])->name('professor.home');
    Route::get('dados', [ProfessorInfoController::class, 'dados'])->name('professor.dados');
    Route::get('notas', fn() => view('professor.notas'))->name('professor.notas');
    Route::get('suporte', fn() => view('professor.suporte'))->name('professor.suporte');
    Route::get('presenca', fn() => view('professor.listPresenca'))->name('professor.presenca');
    Route::get('turma/{turmaId}', [ProfessorTurmaController::class, 'index'])->name('professor.turma');

    Route::get('turma/{turmaId}/tarefas/criar', [ProfessorTurmaController::class, 'create'])->name('professor.turma.tarefas.create');
    Route::post('turma/{turmaId}/tarefas/store', [ProfessorTurmaController::class, 'store'])->name('professor.turma.tarefas.store');
});


Route::prefix('aluno')->middleware([CustomAuthenticate::class . ':aluno'])->group(function () {
    Route::post('logout', [AlunoLoginController::class, 'destroy'])->name('aluno.logout');
    Route::get('Home', [AlunoInfoController::class, 'home'])->name('aluno.home');
    Route::get('dados', [AlunoInfoController::class, 'dados'])->name('aluno.dados');
    Route::get('atividades', [AlunoTarefaController::class, 'tarefas'])->name('aluno.atividades');
    Route::get('notas-e-faltas', fn() => view('aluno.notasFaltas'))->name('aluno.notas');
    Route::get('boletim', fn() => view('aluno.home'))->name('aluno.boletim');
    Route::get('declaracoes', fn() => view('aluno.reclamacoes'))->name('aluno.reclamacoes');
    Route::get('consulta', fn() => view('aluno.consulDeProtocol'))->name('aluno.consulta');
    Route::get('suporte', fn() => view('aluno.suporte'))->name('aluno.suporte');
    Route::get('suporte2', fn() => view('aluno.suporte2'))->name('aluno.suporte2');
});


require __DIR__ . '/auth.php';
