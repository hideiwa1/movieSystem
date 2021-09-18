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
        DB::table('student_classes')->insert([
            [
                'id' => 1,
                'name' => 'class1',
            ],
            [
                'id' => 2,
                'name' => 'class2',
            ],
            [
                'id' => 3,
                'name' => 'class3',
            ],
            [
                'id' => 4,
                'name' => 'class4',
            ],
        ]);
    }
}
