<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Author;
use \App\Models\Category;
use \App\Models\Book;
use \App\Models\Rating;
use Database\Factories\RatingFactory;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::disableQueryLog();//speedup seeding

        Author::factory(1000)->create();

        Category::factory(3000)->create();


        $this->command->info("Create Seeding Books");
        $bookTotal = 100000;
        $chunckSize = 5000;
        for ($i = 0; $i < $bookTotal / $chunckSize; $i++){
            Book::factory($chunckSize)->create();
            $this->command->info(($i + 1) * $chunckSize . " Books Seed");
        }

        $bookIds = Book::pluck('id')->toArray();
        RatingFactory::setBookIds($bookIds);
        
        
        $this->command->info("Create Seeding Ratings (Chunk)");

        $ratingTotal = 500000;
        $ratingChunckSize = 10000;

        for ($i = 0; $i < $ratingTotal / $ratingChunckSize; $i++){
            $ratings = Rating::factory()->count($ratingChunckSize)->make()->toArray();
            DB::table('ratings')->insert($ratings);
            $this->command->info(($i + 1) * $ratingChunckSize . " Ratings Seed");
        }

        $this->command->info('Seeding Finished!');
        
    }
}
