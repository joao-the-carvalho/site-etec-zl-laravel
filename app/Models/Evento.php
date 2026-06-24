<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['nome', 'descricao', 'data', 'turno', 'vagas', 'local', 'imagem'];

    protected $casts = ['data' => 'date'];
}
