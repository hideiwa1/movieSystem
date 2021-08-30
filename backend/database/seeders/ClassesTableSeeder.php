<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'id' => 1,
                'name' => 'class1',
                'delete_flg' => false
            ],
            [
                'id' => 2,
                'name' => 'class2',
                'delete_flg' => false
            ],
            [
                'id' => 3,
                'name' => 'class3',
                'delete_flg' => false
            ],
            [
                'id' => 4,
                'name' => 'class4',
                'delete_flg' => false
            ],
        ]);
    }
}
