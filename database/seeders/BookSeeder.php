<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // make sure categories exist
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        // also seed some authors
        if (Author::count() === 0) {
            Author::factory(5)->create();
        }

        // create books
        Book::factory(20)->create();
    }
}
