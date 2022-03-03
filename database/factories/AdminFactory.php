<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
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
            'name' => 'Ahmad Almabhoh',
            'email' => 'az540546@gmail.com',
            'phone' => '0567077653',
            'status' => '1',
            'bio' => 'This is Ahmad bio',
            'position' => 'admin',
            'password' => Hash::make('password'),
        ];
    }
}
