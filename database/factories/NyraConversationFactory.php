<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NyraConversation>
 */
class NyraConversationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'thread_id' => 'thread_' . fake()->uuid(),
            'rating' => fake()->optional(0.4)->numberBetween(1, 5),
            'message_count' => fake()->numberBetween(1, 20),
        ];
    }

    public function rated(?int $rating = null): static
    {
        return $this->state(fn (array $attributes) => [
            'rating' => $rating ?? fake()->numberBetween(3, 5),
        ]);
    }

    public function unrated(): static
    {
        return $this->state(fn (array $attributes) => [
            'rating' => null,
        ]);
    }
}
