<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'role' => 'Admin'
            ],
            [
                'role' => 'Biasa'
            ],
        ];

        foreach($roles as $role) {
            DB::table('roles')->insert($role);
        }


        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '087730261606',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
     
        DB::table('users')->insert([
            'name' => 'User1',
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'no_hp' => '083841005309',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);
     
        DB::table('users')->insert([
            'name' => 'User2',
            'username' => 'user2',
            'email' => 'user2@gmail.com',
            'no_hp' => '087730261606',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);  
    }
}
