<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
			'email' => $this->faker->name,
			'name' => $this->faker->name,
			'lastname' => $this->faker->name,
			'document' => $this->faker->name,
			'phone' => $this->faker->name,
			'birthday' => $this->faker->name,
        ];
    }
}
