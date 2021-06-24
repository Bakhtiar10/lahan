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
            'no_hp' => '087724276427',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
     
        DB::table('users')->insert([
            'name' => 'Anto',
            'username' => 'anto',
            'email' => 'anto@gmail.com',
            'no_hp' => '085742005389',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]);
     
        DB::table('users')->insert([
            'name' => 'Faisal',
            'username' => 'faisal',
            'email' => 'faisal@gmail.com',
            'no_hp' => '085213276703',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]); 
        
        DB::table('users')->insert([
            'name' => 'Antum',
            'username' => 'antum',
            'email' => 'antum@gmail.com',
            'no_hp' => '085226591596',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]); 

        DB::table('users')->insert([
            'name' => 'Sepul',
            'username' => 'sepul',
            'email' => 'sepul@gmail.com',
            'no_hp' => '081904040700',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'verified' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            
        ]); 
    }
}
