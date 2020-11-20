<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PessoaController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum']], function() {   
    Route::get('/categoria', [CategoriaController::class, 'index']);
    Route::get('/categoria/create', [CategoriaController::class, 'create']);
    Route::post('/categoria/create', [CategoriaController::class, 'store']);
    Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
    Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy']);

    Route::get('/pessoa', [PessoaController::class, 'index']);
    Route::get('/pessoa/create', [PessoaController::class, 'create']);
    Route::post('/pessoa/create', [PessoaController::class, 'store']);
    Route::get('/pessoa/edit/{id}', [PessoaController::class, 'edit']);
    Route::delete('/pessoa/destroy/{id}', [PessoaController::class, 'destroy']);
    
    Route::get('/list/pessoas', [PessoaController::class, 'lista']);
});