<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@demo.com',
            'image' => 'default_user.jpg',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('mo saber'),
            'score' => rand(100, 200),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
