<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' => 'student1',
                'email' => 'student1@com',

            ],
            [
                'name' => 'student2',
                'email' => 'student2@com',

            ],
            [
                'name' => 'student3',
                'email' => 'student3@com',

            ],
            [
                'name' => 'student4',
                'email' => 'student4@com',

            ],
            [
                'name' => 'student5',
                'email' => 'student5@com',

            ],
            [
                'name' => 'student6',
                'email' => 'student6@com',

            ],
            [
                'name' => 'student7',
                'email' => 'student7@com',

            ],
            [
                'name' => 'student8',
                'email' => 'student8@com',

            ],
            [
                'name' => 'student9',
                'email' => 'student9@com',

            ],
            [
                'name' => 'student10',
                'email' => 'student10@com',

            ],
            [
                'name' => 'student11',
                'email' => 'student11@com',

            ],
            [
                'name' => 'student12',
                'email' => 'student12@com',

            ],
            [
                'name' => 'student13',
                'email' => 'student13@com',

            ],
        ]);
    }
}
