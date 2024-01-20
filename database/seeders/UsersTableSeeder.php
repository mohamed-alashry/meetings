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
                'password'      => bcrypt('password'),
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
            DB::table('user_permissions')->insert([
                ['user_id' => 1, 'name' => 'read_room'],
                ['user_id' => 1, 'name' => 'read_user'],
                ['user_id' => 1, 'name' => 'read_invitee'],
                ['user_id' => 1, 'name' => 'update_invitee'],
                ['user_id' => 1, 'name' => 'create_invitee'],
                ['user_id' => 1, 'name' => 'create_user'],
                ['user_id' => 1, 'name' => 'update_user'],
                ['user_id' => 1, 'name' => 'read_room'],
                ['user_id' => 1, 'name' => 'read_user'],
                ['user_id' => 1, 'name' => 'read_invitee'],
                ['user_id' => 1, 'name' => 'update_invitee'],
                ['user_id' => 1, 'name' => 'create_invitee'],
                ['user_id' => 1, 'name' => 'create_user'],
                ['user_id' => 1, 'name' => 'update_user'],
                ['user_id' => 1, 'name' => 'create_room'],
                ['user_id' => 1, 'name' => 'update_room'],
                ['user_id' => 1, 'name' => 'delete_room'],
                ['user_id' => 1, 'name' => 'delete_user'],
                ['user_id' => 1, 'name' => 'delete_invitee'],
                ['user_id' => 1, 'name' => 'delete_meeting'],
                ['user_id' => 1, 'name' => 'update_meeting'],
                ['user_id' => 1, 'name' => 'read_meeting'],
                ['user_id' => 1, 'name' => 'create_meeting'],
                ['user_id' => 1, 'name' => 'invite_to_meeting'],
            ]);
        }
    }
}
