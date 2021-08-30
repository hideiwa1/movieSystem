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
        DB::table('sex')->insert([
            [
                'id' => 1,
                'name' => '男',
                'delete_flg' => false
            ],
            [
                'id' => 2,
                'name' => '女',
                'delete_flg' => false
            ],
            [
                'id' => 3,
                'name' => 'その他',
                'delete_flg' => false
            ],
        ]);
    }
}
