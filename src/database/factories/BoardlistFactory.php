<?php

namespace Database\Factories;

use App\Models\Boardlist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boardlist>
 */
class BoardlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boardlist::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'board_id' => $this->faker->numberBetween(1, 100),
            'boardlist_name' => $this->faker->word(),
            'boardlist_order' => $this->faker->numberBetween(-128, 127),
            'boardlist_archive' => $this->faker->boolean()
        ];
    }
}
