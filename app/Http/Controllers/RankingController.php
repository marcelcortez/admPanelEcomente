<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function index() {
        $jogadores = Ranking::orderByDesc('pontuacao')->get();

        $colocacao = 1;
        foreach ($jogadores as $jogador) {
            $jogador->colocacao = $colocacao++;
        }

        return view('ranking.index', compact('jogadores'));
    }

    public function apiIndex()
    {
        // Obtém os jogadores ordenados por pontuação
        $players = Ranking::orderByDesc('pontuacao')->get();

        return response()->json($players, 200);
    }

    public function apiSave(Request $request)
    {
        try {
            $dados = $request->only(['nome', 'pontuacao']);
    
            // Agora, os dados foram validados, você pode salvar no banco de dados
            Ranking::create($dados);
    
            return response()->json(['message' => 'Dados salvos com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function excluirTodos() {
        Ranking::truncate();

        return redirect()->route('ranking.index')->with('success', 'Todos os registros foram excluídos com sucesso.');
    }
}
