<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(TrainerCategoriesTableSeeder::class);
        //$this->call(ClubsTableSeeder::class);
        //$this->call(SexTableSeeder::class);
        //$this->call(ClassesTableSeeder::class);
        //$this->call(MovieCategoriesTableSeeder::class);
        //$this->call(StudentTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
    }
}
