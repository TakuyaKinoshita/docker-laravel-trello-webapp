<?php

namespace Database\Factories;

use App\Models\Boardcard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boardcard>
 */
class BoardcardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boardcard::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'boardlist_id' => $this->faker->numberBetween(1, 300),
            'boardcard_name' => $this->faker->word(),
            'boardcard_order' => $this->faker->numberBetween(-128, 127),
            'boardcard_archive' => $this->faker->boolean()
        ];
    }
}
