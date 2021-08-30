<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            [
                'id' => 1,
                'name' => 'club1',
                'delete_flg' => false
            ],
            [
                'id' => 2,
                'name' => 'club2',
                'delete_flg' => false
            ],
            [
                'id' => 3,
                'name' => 'club3',
                'delete_flg' => false
            ],
            [
                'id' => 4,
                'name' => 'club4',
                'delete_flg' => false
            ],
        ]);
    }
}
