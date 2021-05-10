<?php

use Illuminate\Database\Seeder;

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
                'role' => 'Penjual'
            ],
            [
                'role' => 'Pembeli'
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
            'role_id' => 1
        ]);
     
        DB::table('users')->insert([
            'name' => 'penjual',
            'username' => 'penjual',
            'email' => 'penjual@gmail.com',
            'no_hp' => '083841005309',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
     
        DB::table('users')->insert([
            'name' => 'pembeli',
            'username' => 'pembeli',
            'email' => 'pembeli@gmail.com',
            'no_hp' => '087730261606',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);  
    }
}
