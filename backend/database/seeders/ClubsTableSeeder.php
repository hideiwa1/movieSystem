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

            ],
            [
                'id' => 2,
                'name' => 'club2',
            ],
            [
                'id' => 3,
                'name' => 'club3',
            ],
            [
                'id' => 4,
                'name' => 'club4',

            ],
        ]);
    }
}
