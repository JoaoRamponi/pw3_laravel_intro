<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Campos que podem ser preenchidos em massa!!!
    protected $fillable = ['nome', 'preco', 'estoque'];
}
