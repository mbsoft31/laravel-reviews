<?php

namespace Mbsoft31\LaravelReviews\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mbsoft31\LaravelReviews\Models\Review;
use Mbsoft31\LaravelReviews\Models\User;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'reviewable_id' => SomeModel::factory(),
            'reviewable_type' => SomeModel::class,
            'comment' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
