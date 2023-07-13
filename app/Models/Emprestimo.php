<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = 'emprestimos';
    protected $fillable = [
        'id_usuario',
        'id_livro',
        'data_limite',
        'multa',
        'notificacao',
        'arquivado'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'id_livro');
    }
}
