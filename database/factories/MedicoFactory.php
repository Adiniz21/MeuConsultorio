<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            // Exemplo de CRM fictício
            'crm'  => $this->faker->unique()->bothify('CRM-#####'), 
            // Escolhe aleatoriamente uma especialidade
            'especialidade' => $this->faker->randomElement([
                'Cardiologia', 'Ortopedia', 'Ginecologia', 'Pediatria', 'Clínico Geral'
            ]),
        ];
    }
}
