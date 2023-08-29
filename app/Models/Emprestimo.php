<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = 'emprestimos';
    protected $fillable = [
        'id_aluno',
        'id_livro',
        'data_limite',
        'multa',
        'notificacao',
        'arquivado'
    ];
    protected $casts = [
        'data_limite' => 'datetime'
    ];
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'id_livro');
    }
}
