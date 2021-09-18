<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->insert([
            [
                'id' => 1,
                'name' => '男',

            ],
            [
                'id' => 2,
                'name' => '女',

            ],
            [
                'id' => 3,
                'name' => 'その他',

            ],
        ]);
    }
}
