<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainerCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainer_categories')->insert([
            [
                'id' => 1,
                'name' => 'category1',
                'delete_flg' => false
            ],
            [
                'id' => 2,
                'name' => 'category2',
                'delete_flg' => false
            ],
            [
                'id' => 3,
                'name' => 'category3',
                'delete_flg' => false
            ],
            [
                'id' => 4,
                'name' => 'category4',
                'delete_flg' => false
            ],
        ]);
    }
}
