<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{

    use HasFactory;
    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'crm',
        'especialidade'
    ];

    // Um médico tem vários atendimentos
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    public function pacientes()
    {
        return $this->hasManyThrough(
            Paciente::class,
            Atendimento::class,
            'medico_id',    // chave estrangeira em 'atendimentos'
            'id',           // chave local em 'pacientes'
            'id',           // chave local em 'medicos'
            'paciente_id'   // chave estrangeira em 'atendimentos'
        );
    }
}
