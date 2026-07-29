<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livros extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'ano_publicacao'
    ];
}