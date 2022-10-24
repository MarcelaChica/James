<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'price' => $this->faker->name,
			'num_class' => $this->faker->name,
        ];
    }
}
