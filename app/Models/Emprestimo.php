<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'leitor_id',
        'data_emprestimo',
        'data_devolucao',
        'quantidade_emprestada'
    ];

    public function livro() {
        return $this->belongsTo(Livro::class);
    }

    public function leitor() {
        return $this->belongsTo(Leitor::class);
    }
}
