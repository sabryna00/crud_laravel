<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'departamento_id',
        'cargo_id',
        'turno_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
