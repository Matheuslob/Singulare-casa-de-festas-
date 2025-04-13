<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstudoController;


Route::get('/', [EstudoController::class, 'index']);
Route::get('/eventos/create', [EstudoController::class, 'create'])->middleware('auth');
Route::get('/eventos/{id}', [EstudoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/entrar', [EstudoController::class, 'entrar']);
Route::get('/eventos/cadastrar', [EstudoController::class, 'cadastrar']);
Route::get('/eventos/sobre', [EstudoController::class, 'sobre']);
Route::get('/dashboard',[EstudoController::class,'dashboard'])->middleware('auth');
Route::delete('/eventos/{id}',[EstudoController::class, 'destroy'])->middleware('auth');
Route::get('/eventos/edit/{id}',[EstudoController::class, 'edit'])->middleware('auth');
Route::put('/eventos/update/{id}',[EstudoController::class,'update'])->middleware('auth');


// Rota para salvar o evento depois que o usuário confirmar
Route::post('/eventos/store', [EstudoController::class, 'store'])->name('eventos.store');



