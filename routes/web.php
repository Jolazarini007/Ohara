<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/* Route::get('/dash', function () {
    return view('welcome');
}); */

Route::get('/', function () { return view('escolhaLogin'); })->name('escolhaLogin');
Route::get('/', function () { return view('escolhaLogin'); })->name('gestao.login');


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
require __DIR__.'/user-auth.php';