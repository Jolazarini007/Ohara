<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Professor\Auth\ProfessorLoginController;
use App\Http\Controllers\Aluno\Auth\AlunoLoginController;

Route::prefix('professor')->middleware('guest:professor')->group(function () {

    Route::get('login', [ProfessorLoginController::class, 'create'])->name('professor.login');

    Route::post('login', [ProfessorLoginController::class, 'store'])->name('professor.login');

});

Route::prefix('professor')->middleware('auth:professor')->group(function () {

    Route::post('logout', [ProfessorLoginController::class, 'destroy'])->name('professor.logout');

    Route::get('/Home', function(){
        return view('professor.home');
    })->name('professor.home');
});


Route::prefix('aluno')->middleware('guest:aluno')->group(function () {

    Route::get('login', [AlunoLoginController::class, 'create'])->name('aluno.login');

    Route::post('login', [AlunoLoginController::class, 'store'])->name('aluno.login');

});

Route::prefix('aluno')->middleware('auth:aluno')->group(function () {

    Route::post('logout', [AlunoLoginController::class, 'destroy'])->name('aluno.logout');

    Route::get('/Home', function(){
        return view('aluno.home');
    })->name('aluno.home');
});
