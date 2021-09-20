<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'filepath' => 'sample',
                'name' => 'サンプルビデオ１',
                'comment' => 'サンプルテキスト１',
                'category_id' => 1,

            ],
            [
                'filepath' => 'sample',
                'name' => 'サンプルビデオ２',
                'comment' => 'サンプルテキスト２',
                'category_id' => 2,
            ],
            [
                'filepath' => 'sample',
                'name' => 'サンプルビデオ３',
                'comment' => 'サンプルテキスト３',
                'category_id' => 1,
            ],
        ]);
    }
}
