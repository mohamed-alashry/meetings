<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!DB::table('users')->first()) {
            $now = now();
            DB::table('users')->insert([
                'name'          => 'user',
                'email'         => 'user@email.com',
                'password'      => 'password',
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }
    }
}
