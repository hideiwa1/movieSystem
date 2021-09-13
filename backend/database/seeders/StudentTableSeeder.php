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
                'name' => 'student2',
                'email' => 'student2@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student3',
                'email' => 'student3@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student4',
                'email' => 'student4@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student5',
                'email' => 'student5@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student6',
                'email' => 'student6@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student7',
                'email' => 'student7@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student8',
                'email' => 'student8@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student9',
                'email' => 'student9@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student10',
                'email' => 'student10@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student11',
                'email' => 'student11@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student12',
                'email' => 'student12@com',
                'delete_flg' => false
            ],
            [
                'name' => 'student13',
                'email' => 'student13@com',
                'delete_flg' => false
            ],
        ]);
    }
}
