<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('login.index'));
});

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function(){return view('home.index');})->name('home.index');  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group([
        'prefix' => 'categorias',
        'as' => 'categorias.'
    ], function(){
        Route::get('', [CategoriaController::class, 'index'])->name('index');
        Route::post('', [CategoriaController::class, 'save'])->name('save');
        Route::get('create', [CategoriaController::class, 'create'])->name('create');
        Route::get('{categoria}/edit', [CategoriaController::class, 'edit'])->name('edit');
        Route::put('{categoria}/update', [CategoriaController::class, 'update'])->name('update');
        Route::delete('{categoria}/delete', [CategoriaController::class, 'delete'])->name('delete');

    });

    Route::group([
        'prefix' => 'perguntas',
        'as' => 'perguntas.'
    ], function(){
        Route::get('', [PerguntaController::class, 'index'])->name('index');
        Route::get('create', [PerguntaController::class, 'create'])->name('create');
        Route::post('', [PerguntaController::class, 'save'])->name('save');
        Route::get('listar', [PerguntaController::class, 'listar'])->name('listar');
        Route::post('navegar', [PerguntaController::class, 'navegar'])->name('navigate');
        Route::get('{pergunta}/edit', [PerguntaController::class, 'edit'])->name('edit');
        Route::put('{pergunta}/update', [PerguntaController::class, 'update'])->name('update');
        Route::delete('{pergunta}/delete', [PerguntaController::class, 'delete'])->name('delete');
    });

    Route::prefix('ranking')->group(function(){
        Route::get('', [RankingController::class, 'index'])->name('ranking.index');
        Route::get('excluir-todos', [RankingController::class, 'excluirTodos'])->name('excluir.todos');
    });


    Route::group([
        'prefix' => 'usuario',
        'as' => 'usuario.'
    ], function(){
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('', [UserController::class, 'save'])->name('save');
        Route::delete('{usuario}/delete', [UserController::class, 'delete'])->name('delete');
    });
});