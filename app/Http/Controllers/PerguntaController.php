<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Pergunta;
use App\Models\Categoria;
use Illuminate\Http\Resources\Json\JsonResource;

class PerguntaController extends Controller
{
    public function index(){
        $perguntas = Pergunta::all();
        $perguntaAtual = $perguntas->first(); // Exibindo a primeira pergunta por padrão

        $perguntaController = $this;

        return view('perguntas.index', compact('perguntas', 'perguntaAtual', 'perguntaController'));
    }

    public function apiIndex(){
        $perguntas = Pergunta::all();

        $perguntasFiltradas = $perguntas->map(function ($pergunta) {
            return [
                'pergunta' => $pergunta->pergunta,
                'alternativa1' => $pergunta->alternativa1,
                'alternativa2' => $pergunta->alternativa2,
                'alternativa3' => $pergunta->alternativa3,
                'alternativa4' => $pergunta->alternativa4,
                'respostaCorreta' => $pergunta->respostaCorreta,
                'dificuldade' => $pergunta->dificuldade,
            ];
        });

        return Response::json($perguntasFiltradas, 200);
    }

    public function create(){
        $categorias = Categoria::all();
        return view('perguntas.create', ['categorias' => $categorias]);
    }

    public function save(Request $request){
        $data = $request->validate([
            'categorias_id' => 'required',
            'pergunta' => 'required',
            'alternativa1' => 'required',
            'alternativa2' => 'required',
            'alternativa3' => 'required',
            'alternativa4' => 'required',
            'respostaCorreta' => 'required',
            'dificuldade' => 'required'
        ]);

        $newPergunta = Pergunta::create($data);

        return redirect(route('perguntas.index'))->with('success', 'Pergunta adicionada com sucesso!');
    }

    public function edit(Pergunta $pergunta){
        $categorias = Categoria::all();

        return view('perguntas.edit', compact('pergunta', 'categorias'));

    }

    public function update(Pergunta $pergunta, Request $request){
        $data = $request->validate([
            'categorias_id' => 'required',
            'pergunta' => 'required',
            'alternativa1' => 'required',
            'alternativa2' => 'required',
            'alternativa3' => 'required',
            'alternativa4' => 'required',
            'respostaCorreta' => 'required',
            'dificuldade' => 'required'
        ]);

        $pergunta->update($data);

        return redirect(route('perguntas.index'))->with('success', 'Pergunta alterada com sucesso!');
    }

    public function delete(Pergunta $pergunta){
        $pergunta->delete();
        return redirect(route('perguntas.index'))->with('success', 'Pergunta deletada com sucesso');
    }

    public function navegar(Request $request)
    {
        $perguntas = Pergunta::all();
        $perguntaAtualId = $request->input('perguntaAtualId');
        $perguntaController = $this;

        $indiceAtual = $perguntas->search(function ($pergunta) use ($perguntaAtualId) {
            return $pergunta->id == $perguntaAtualId;
        });

        $direcao = $request->input('direcao');

        if ($direcao == 'anterior') {
            $perguntaAtual = $indiceAtual > 0 ? $perguntas[$indiceAtual - 1] : $perguntas->last();
        } elseif ($direcao == 'proximo') {
            $perguntaAtual = $indiceAtual < $perguntas->count() - 1 ? $perguntas[$indiceAtual + 1] : $perguntas->first();
        } else {
            // Lida com uma direção desconhecida (pode adicionar uma lógica personalizada aqui)
            $perguntaAtual = $perguntas->first();
        }

        return view('perguntas.index', compact('perguntas', 'perguntaAtual', 'perguntaController'));
    }

    public function obterNomeDificuldade($valor){
        switch ($valor) {
            case 1:
                return 'Fácil';
            case 2:
                return 'Médio';
            case 3:
                return 'Difícil';
            default:
                return 'Desconhecido';
        }
    }
}
