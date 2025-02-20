<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email'
    ];

    protected $casts = [
        'data_nascimento' => 'datetime',
    ];

    // Um paciente tem vários atendimentos
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    // Se quiser puxar médicos relacionados indiretamente
    public function medicos()
    {
        return $this->hasManyThrough(
            Medico::class,
            Atendimento::class,
            'paciente_id',  // chave estrangeira em 'atendimentos'
            'id',           // chave local em 'medicos'
            'id',           // chave local em 'pacientes'
            'medico_id'     // chave estrangeira em 'atendimentos'
        );
    }

    public function getCpfMaskAttribute()
    {
        // Remove qualquer caractere que não seja dígito
        $cpfLimpo = preg_replace('/\D/', '', $this->cpf);

        // Se tiver 11 dígitos, formata
        if (strlen($cpfLimpo) === 11) {
            return substr($cpfLimpo, 0, 3).'.'.
                   substr($cpfLimpo, 3, 3).'.'.
                   substr($cpfLimpo, 6, 3).'-'.
                   substr($cpfLimpo, 9, 2);
        }

        // Se não tiver 11 dígitos, apenas retorna como está
        return $this->cpf;
    }
}

