<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuthenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Aluno\Auth\AlunoLoginController;
use App\Http\Controllers\Professor\Auth\ProfessorLoginController;

/* Route::get('/dash', function () {
    return view('welcome');
}); */

Route::get('/', function () { return view('auth.login'); })->name('login');

Route::prefix('professor')->middleware([RedirectIfAuthenticated::class.':professor'])->group(function () {
    Route::get('login', [ProfessorLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class. ':aluno')->name('professor.login');
    Route::post('login', [ProfessorLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class. ':aluno')->name('professor.login');
});


Route::prefix('professor')->middleware([CustomAuthenticate::class.':professor'])->group(function () {
    Route::post('logout', [ProfessorLoginController::class, 'destroy'])->name('professor.logout');
    Route::get('/Home', fn() => view('professor.home'))->name('professor.home');
});


Route::prefix('aluno')->middleware([RedirectIfAuthenticated::class.':aluno'])->group(function () {
    Route::get('login', [AlunoLoginController::class, 'create'])->middleware(RedirectIfAuthenticated::class. ':professor')->name('aluno.login');
    Route::post('login', [AlunoLoginController::class, 'store'])->middleware(RedirectIfAuthenticated::class. ':professor')->name('aluno.login');
});

Route::prefix('aluno')->middleware([CustomAuthenticate::class.':aluno'])->group(function () {
    Route::post('logout', [AlunoLoginController::class, 'destroy'])->name('aluno.logout');
    Route::get('/Home', fn() => view('aluno.home'))->name('aluno.home');
});

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
require __DIR__.'/auth.php';
// require __DIR__.'/user-auth.php';