<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'             => $this->faker->name(),
            'birthDate'        => $this->faker->date,
            'salary'           => $this->faker->randomDigitNotNull(),
            'active'           => $this->faker->boolean,
            'leaveDaysPerYear' => $this->faker->randomDigitNotNull(),
            'sickDaysPerYear'  => $this->faker->randomDigitNotNull(),
        ];
    }
}
