<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity = [
            [
                'id' => 1,
                'name' => 'approved'
            ], [
                'id' => 2,
                'name' => 'except'
            ], [
                'id' => 3,
                'name' => 'rejected'
            ]
        ];
        DB::table('activities')->insert($activity);
    }
}
