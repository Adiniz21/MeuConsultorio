<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atendimento extends Model
{
    use HasFactory;
    protected $table = 'atendimentos';

    protected $fillable = [
        'data_atendimento',
        'medico_id',
        'paciente_id'
    ];

    protected $casts = [
        'data_atendimento' => 'datetime',
    ];

    // Relacionamentos
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
