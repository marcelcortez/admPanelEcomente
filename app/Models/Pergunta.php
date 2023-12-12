<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorias_id',
        'pergunta',
        'alternativa1',
        'alternativa2',
        'alternativa3',
        'alternativa4',
        'respostaCorreta',
        'dificuldade'
    ];

    /* public function categoria(){
        return $this->belongsTo(Categoria::class, 'categorias_id', 'id');
    } */

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }
}
