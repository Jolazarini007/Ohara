<?php

use App\Http\Controllers\Aluno\Auth\AlunoLoginController;
use Illuminate\Support\Facades\Route;

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
