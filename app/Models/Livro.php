<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';
    protected $fillable = [
        'titulo',
        'autor',
        'descricao',
        'imagem',
        'slug',
        'id_categoria',
        'clube_do_livro',
        'disponiveis',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
    public function emprestimos() {
        return $this->belongsToMany(Livro::class, 'emprestimos', 'id_aluno', 'id_livro');

    }

}
