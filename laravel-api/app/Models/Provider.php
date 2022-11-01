<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = ['providers'];
    protected $primaryKey = ['id'];
    protected $fillable = ['nome', 'celular', 'cnpj'];
}
