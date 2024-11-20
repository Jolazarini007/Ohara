<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Professor\Auth\ProfessorLoginController;

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
