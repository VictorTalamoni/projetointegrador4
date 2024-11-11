<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// Rota do dashboard usando o UserController para exibir os usuários
Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rotas específicas para eventos (não mais utilizando Route::resource)
Route::get('/eventos/editar/{id}', [UserController::class, 'edit'])->name('eventos.editar');
Route::put('/eventos/update/{id}', [UserController::class, 'update'])->name('eventos.update');
Route::get('/eventos/perfil/{id}', [UserController::class, 'show'])->name('eventos.perfil');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Rota para dicas
Route::get('/eventos/dicas', function () {
    return view('eventos.dicas');
})->name('eventos.dicas');

// Rotas para perfil, quizzes, etc.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
});

Route::middleware(['auth', 'isTeacher'])->group(function () {
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
});

// Importa rotas de autenticação, como login e registro
require __DIR__.'/auth.php';
