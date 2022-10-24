<?php

namespace Database\Factories;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
			'id_user' => $this->faker->name,
			'id_package' => $this->faker->name,
			'state' => $this->faker->name,
			'date' => $this->faker->name,
			'start' => $this->faker->name,
			'end' => $this->faker->name,
			'num_class' => $this->faker->name,
        ];
    }
}
