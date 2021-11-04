<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'forum@forum.ru',
                'password' => 'FM40',
                'role_id' => '2'
            ]
        ];
        DB::table('users')->insert($users);

    }
}
