<?php
namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'isbn' => $this->faker->unique()->isbn13(),
            'description' => $this->faker->paragraph(),
            'published_year' => $this->faker->year(),
            'available_stock' => $this->faker->numberBetween(1, 20),

            // Foreign keys
            'category_id' => Category::inRandomOrder()->first()->category_id ?? Category::factory(),
            'author_id'   => Author::inRandomOrder()->first()->author_id ?? Author::factory(),
        ];
    }
}