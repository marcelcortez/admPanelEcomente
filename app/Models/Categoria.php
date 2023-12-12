<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pergunta;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function perguntas()    {
        return $this->hasMany(Pergunta::class, 'categorias_id');
    }
}
