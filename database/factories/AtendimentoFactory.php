<?php

namespace Database\Factories;

use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtendimentoFactory extends Factory
{
    protected $model = Atendimento::class;

    public function definition()
    {
        return [
            'data_atendimento' => $this->faker->dateTimeBetween('-6 months', 'now'),

            // Pega um médico existente de forma aleatória
            'medico_id' => function () {
                return Medico::inRandomOrder()->first()->id; 
            },

            // Pega um paciente existente de forma aleatória
            'paciente_id' => function () {
                return Paciente::inRandomOrder()->first()->id;
            },
        ];
    }
}
