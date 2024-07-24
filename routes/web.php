<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class,'index'])->name('index');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::get('/events/{id}', [EventController::class, 'show'])->name('show');
Route::post('/events', [EventController::class, 'store']);


Route::get('/contacto', function () {
    $nome = "RafaelZin";
    $idade = 37;
    $acao = "voltar para home";
    return view('contact',['nome' => $nome, 'idade' => $idade, 'acao' => $acao]);
});
