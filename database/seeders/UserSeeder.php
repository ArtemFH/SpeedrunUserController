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
                'name' => 'admin',
                'last_name' => 'admin',
                'password' => '$2y$10$jiXZe.QrgOmZibZUYkTQj.SsDfliTlOyd3U1xktbUDjJL4mLrYPeW', //FM40
                'role_id' => DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()
            ]
        ];
        DB::table('users')->insert($users);

    }
}
