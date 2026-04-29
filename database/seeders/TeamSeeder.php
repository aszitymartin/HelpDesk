<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $teams = [
            'customers',
            'admins'
        ];

        foreach ($teams as $team) {
            Team::create(['name' => $team]);
        }

    }
}
