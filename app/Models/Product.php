<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'preco',
        'fornecedor_id',
        'categoria_id'
    ];

    public function Provider()
    {
        return $this->belongsTo('App\Models\Provider', 'fornecedor_id');
    }

     public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'categoria_id');
    }
}
