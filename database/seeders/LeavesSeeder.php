<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leave::create([
            'leave_type'  => 'Sick',
            'date_from' =>'26-03',
            'date_to' =>'9-1',
            'description' => 'Hi',
            'status' => 'admin'
        ]);
    }
}
