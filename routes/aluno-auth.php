<?php

use App\Http\Controllers\Aluno\Auth\AlunoLoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('aluno')->group(function () {

    // Rotas públicas para login (guest:aluno middleware aplicado)
    Route::middleware('guest:aluno')->group(function () {
        Route::get('login', [AlunoLoginController::class, 'create'])->name('aluno.login'); // Exibe a página de login
        Route::post('login', [AlunoLoginController::class, 'store'])->name('aluno.login.store'); // Processa o login
    });

    // Rotas protegidas para aluno autenticado (auth:aluno middleware aplicado)
    Route::middleware('auth:aluno')->group(function () {
        Route::post('logout', [AlunoLoginController::class, 'destroy'])->name('aluno.logout'); // Processa o logout
        Route::get('home', function () {
            return view('aluno.home'); // Exibe a home do aluno
        })->name('aluno.home');
    });
});
