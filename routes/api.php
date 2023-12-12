<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\RankingController;


Route::get('perguntas/listar', [PerguntaController::class, 'apiIndex']);

Route::get('ranking', [RankingController::class, 'apiIndex']);
Route::post('ranking', [RankingController::class, 'apiSave']);