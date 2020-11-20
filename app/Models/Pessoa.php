<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'categoria_id'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
