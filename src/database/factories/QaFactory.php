<?php

namespace Database\Factories;

use App\Models\Qa;
use App\Models\QaGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class QaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'qa_group_id' => 1,
            'question' => $this->faker->name,
            'answer' => $this->faker->name,
            'order' =>1
        ];
    }
}
