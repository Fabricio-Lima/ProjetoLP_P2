<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'preco',
        'categoria_id',
        'fornecedor_id',
    ];
}
