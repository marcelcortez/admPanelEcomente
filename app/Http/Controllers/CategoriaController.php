<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Pergunta;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias' => $categorias]);
    }

    public function create(){
        return view('categorias.create');
    }

    public function save(Request $request){
        $data = $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $newCategoria = Categoria::create($data);

        return redirect(route('categorias.index'))->with('success', 'Categoria adicionada com sucesso');
    }

    public function edit(Categoria $categoria){
        return view('categorias.edit', ['categoria' => $categoria]);

    }

    public function update(Categoria $categoria, Request $request){
        $data = $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $categoria->update($data);

        return redirect(route('categorias.index'))->with('success', 'Categoria alterada com sucesso');
    }

    public function delete(Categoria $categoria){
        $categoria->perguntas()->delete();
        $categoria->delete();

        return redirect(route('categorias.index'))->with('success', 'Categoria deletada com sucesso');
    }
}
