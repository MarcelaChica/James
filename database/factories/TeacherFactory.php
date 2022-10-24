<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'lastname' => $this->faker->name,
			'document' => $this->faker->name,
        ];
    }
}
