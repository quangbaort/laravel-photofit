<?php

namespace Database\Factories;

use App\Models\QaGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class QaGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QaGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'order' => 1
        ];
    }
}
