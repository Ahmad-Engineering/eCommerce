<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminClientsFactory extends Factory
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
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'client_id' => Client::inRandomOrder()->first()->id,
        ];
    }
}
