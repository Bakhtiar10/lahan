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
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
     
        DB::table('penjual')->insert([
            'name' => 'penjual',
            'email' => 'penjual@gmail.com',
            'password' => Hash::make('password'),
        ]);
     
        DB::table('pembeli')->insert([
            'name' => 'pembeli',
            'email' => 'pembeli@gmail.com',
            'password' => Hash::make('password'),
        ]);  
    }
}
