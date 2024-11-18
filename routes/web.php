<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;

Route::get('/dash', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/aluno/login', [AlunoController::class, 'showLoginAluno'])->name('showLoginAluno');

Route::post('/aluno/login', [AlunoController::class, 'loginAluno'])->name('loginAluno');

Route::get('/aluno/Home', [AlunoController::class, 'showHomeAluno'])->name('homeAluno');

Route::get('/professor/login', [ProfessorController::class, 'showLoginProfessor'])->name('showLoginProfessor');

Route::post('/professor/login', [ProfessorController::class, 'loginProfessor'])->name('loginProfessor');

Route::get('/professor/Home', [ProfessorController::class, 'showHomeProfessor'])->name('homeProfessor');

Route::get('/', function () { return view('escolhaLogin'); })->name('gestao.login');

require __DIR__.'/auth.php';
