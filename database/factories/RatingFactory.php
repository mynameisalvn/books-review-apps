<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static $bookIds;


    public static function setBookIds(array $ids): void {
        self::$bookIds = $ids;
    }

    public function definition(): array
    {
        return [
            'book_id'=>$this-> faker->randomElement(self::$bookIds),
            'rating' => $this->faker->numberBetween(1, 10),
        ];
    }
    
}
