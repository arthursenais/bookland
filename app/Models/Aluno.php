<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $table = 'alunos';

    protected $fillable = [
        'nome_completo',
        'matricula',
        'ativo',
        

    ];
    public function emprestimos()
    {
        return $this->belongsToMany(Livro::class, 'emprestimos', 'id_aluno', 'id_livro');
    }

}
