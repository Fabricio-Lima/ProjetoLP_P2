<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = ['orders'];
    protected $primaryKey = ['id'];
    protected $foreignKey = ['usuario_id', 'produto_id', 'categoria_id', 'fornecedor_id'];
    protected $fillable = ['codigo', 'precoTotal', 'quantidade', 'dataHora', 'pagamento'];
}
