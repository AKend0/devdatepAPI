<?php

namespace Database\Factories;

use App\Models\Turn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applier>
 */
class ApplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'    =>  fake()->name(),
            'apellidoP' =>  fake()->word(),
            'apellidoM' =>  fake()->word(),
            'email'     =>  fake()->safeEmail(),
            'phone'     =>  fake()->phoneNumber(),
            'dni'       =>  fake()->randomNumber(8,true),
            'turn_id'   =>  null,
        ];
    }
}

