<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;
    protected $table = 'categorias';

    public function livros() {
        return $this->hasMany(Livro::class,'id_categoria','id');
    }
}
