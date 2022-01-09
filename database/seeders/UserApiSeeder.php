<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'TestRestUser',
            'email'=>'admin@test.com',
            'gender'=>'mail',
            'nic_number'=> '842081203v',
            'password'=>Hash::make('password')
        ]);
    }
}
