<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quantidade',
        'pagamento',
        'precoTotal',
        'usuario_id',
        'produto_id'
    ];
  
    public function Product()
    {
        return $this->belongsTo('App\Models\Product', 'produto_id');
    }
  
     public function User()
    {
        return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
