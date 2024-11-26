<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuthenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Aluno\AlunoInfoController;
use App\Http\Controllers\Aluno\Auth\AlunoLoginController;
use App\Http\Controllers\Gestor\Auth\GestorLoginController;
use App\Http\Controllers\Professor\ProfessorInfoController;
use App\Http\Controllers\Professor\Auth\ProfessorLoginController;

Route::get('/', function () { return view('auth.login'); })->name('login');

Route::prefix('professor')->middleware([RedirectIfAuthenticated::class.':professor'])->group(function () {
    Route::get('login', [ProfessorLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class. ':professor')->name('professor.login');
    Route::post('login', [ProfessorLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class. ':professor')->name('professor.login');
});

Route::prefix('gestao')->middleware([RedirectIfAuthenticated::class.':gestor'])->group(function () {
    Route::get('login', [GestorLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class. ':gestor')->name('gestao.login');
    Route::post('login', [GestorLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class. ':gestor')->name('gestao.login');
});

Route::prefix('aluno')->middleware([RedirectIfAuthenticated::class.':aluno'])->group(function () {
    Route::get('login', [AlunoLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class. ':aluno')->name('aluno.login');
    Route::post('login', [AlunoLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class. ':aluno')->name('aluno.login');
});

Route::prefix('gestao')->middleware([CustomAuthenticate::class.':gestor'])->group(function () {
    Route::get('home', fn() => view('gestao.home'))->name('gestao.home');
    Route::post('logout', [GestorLoginController::class, 'destroy'])->name('gestao.logout');
});


Route::prefix('professor')->middleware([CustomAuthenticate::class.':professor'])->group(function () {
    Route::post('logout', [ProfessorLoginController::class, 'destroy'])->name('professor.logout');
    Route::get('home', [ProfessorInfoController::class, 'home'])->name('professor.home');
    Route::get('notas', fn() => view('professor.notas'))->name('professor.notas');
    Route::get('suporte', fn() => view('professor.suporte'))->name('professor.suporte');
    Route::get('presenca', fn() => view('professor.listPresenca'))->name('professor.presenca');
});


Route::prefix('aluno')->middleware([CustomAuthenticate::class.':aluno'])->group(function () {
    Route::post('logout', [AlunoLoginController::class, 'destroy'])->name('aluno.logout');
    Route::get('Home', [AlunoInfoController::class, 'home'])->name('aluno.home');
    Route::get('dados', [AlunoInfoController::class, 'dados'])->name('aluno.dados');
    Route::get('atividades', fn() => view('aluno.atividades'))->name('aluno.atividades');
    Route::get('notas-e-faltas', fn() => view('aluno.notasFaltas'))->name('aluno.notas');
    Route::get('boletim', fn() => view('aluno.home'))->name('aluno.boletim');
    Route::get('declaracoes', fn() => view('aluno.reclamacoes'))->name('aluno.reclamacoes');
    Route::get('consulta', fn() => view('aluno.consulDeProtocol'))->name('aluno.consulta');
    Route::get('suporte', fn() => view('aluno.suporte'))->name('aluno.suporte');
    Route::get('suporte2', fn() => view('aluno.suporte2'))->name('aluno.suporte2');

});





require __DIR__.'/auth.php';

/* Route::get('/dash', function () {
    return view('welcome');
}); */

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
// require __DIR__.'/user-auth.php';