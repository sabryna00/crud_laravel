<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    /**
     * Define os campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'departamento_id',
        'cargo_id',
        'turno_id',
    ];

    /**
     * Relacionamento com a tabela departamentos.
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Relacionamento com a tabela cargos.
     */
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    /**
     * Relacionamento com a tabela turnos.
     */
    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
