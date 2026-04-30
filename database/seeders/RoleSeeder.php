<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $team = Team::where('name', 'admin')->firstOrFail();
        
        $roles = [
            'Admin',
            'Staff',
            'Customer'
        ];

        foreach ($roles as $role) {

            $team = Team::where('name', 'admin')->firstOrFail();

            Role::firstOrCreate([
                'name'      => $role,
                'team_id'   => $team->id,
                'is_system' => true
            ]);
        }

    }
}
