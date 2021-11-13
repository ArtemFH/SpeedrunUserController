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
                'email' => 'admin@admin.admin',
                'name' => 'admin',
                'last_name' => 'admin',
                'password' => '$2y$10$mEKIfHvsOFxgsw5YBMLuFee2FGbRMNG.LnRzG/WfP22ZQicwRrphS', //admin
                'role_id' => DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()
            ]
        ];
        DB::table('users')->insert($users);

    }
}
