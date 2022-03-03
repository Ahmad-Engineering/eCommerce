<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'type' => $this->faker->lastName(),
            'status' => '1',
            'admin_id' => Admin::inRandomOrder()->first()->id,
        ];
    }
}
