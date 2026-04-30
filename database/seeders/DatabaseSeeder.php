<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\PermissionRegistrar;

use Database\Seeders\TeamSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\TeamRolePermissionSeeder;
use App\Models\Team;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            TeamSeeder::class,
            PermissionSeeder::class,
            TeamRolePermissionSeeder::class
        ]);

        $team = Team::where('name', 'admin')->firstOrFail();

        app(PermissionRegistrar::class)->setPermissionsTeamId($team->id);

        $user = User::factory()->create([
            'name'      => 'Admin',
            'email'     => 'test@example.com',
            'team_id'   => $team->id,
            'password'  => Hash::make('Start1234'),
        ]);

        $adminRole = Role::where([
            'name' => 'Admin',
            'team_id' => $team->id,
            'guard_name' => 'web',
        ])->firstOrFail();

        $user->assignRole($adminRole);

    }
}
