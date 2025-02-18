<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            // Gera 11 dígitos numéricos (ex.: 12345678901)
            'cpf'  => $this->faker->unique()->numerify('###########'), 
            'data_nascimento' => $this->faker->dateTimeBetween('-80 years', '-18 years'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
