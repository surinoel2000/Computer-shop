<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Minh Minh',
                'email' => 'oggy@gmail.com',
                'password' => Hash::make('123123123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

                'name' => 'Mink Mink',
                'email' => 'admin',
                'password' => Hash::make('123123'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
