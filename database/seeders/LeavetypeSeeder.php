<?php

namespace Database\Seeders;

use App\Models\Leavetype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeavetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leavetype::create([
            'leave_type'  => 'Casual Leave',
            'description' => 'Casual Leave :D'
        ]);
    }
}
