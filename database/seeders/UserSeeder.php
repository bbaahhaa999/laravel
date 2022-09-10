<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        User::create([
            'name'  => 'user',
            'email' =>'user@gmail.com',
            'password'=>Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name'  => 'admin',
            'email' =>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'role'    =>'admin',
        ]);
    }
}
