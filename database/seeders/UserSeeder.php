<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table("users")->where("email", "smladeoye@gmail.com")->first()) {
            DB::table('users')->insert([
                'name' => "Admin User",
                'email' => 'smladeoye@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
        if (!DB::table("users")->where("email", "smladeoye@ymail.com")->first()) {
            DB::table('users')->insert([
                'name' => "Administrator User",
                'email' => 'smladeoye@ymail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
