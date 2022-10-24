<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
			'id_user' => $this->faker->name,
			'id_teacher' => $this->faker->name,
			'date' => $this->faker->name,
			'address' => $this->faker->name,
			'state' => $this->faker->name,
        ];
    }
}
