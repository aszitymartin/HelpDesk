<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TeamRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       $teamRoles = [
            'admin'    => "Admin",
            'staff'    => "Staff",
            'customer' => "Customer"
        ];

        $rolePermissions = [

            'Admin' => ['*'],

            'Staff' => [
                // dashboard
                'dashboard.view',

                // tickets
                'tickets.view',
                'tickets.manage',

                // events
                'events.view',

                // categories / labels
                'categories.view',
                'labels.view',

                // templates
                'templates_email.view',
                'templates_ticket.view',

                // users (limited admin capability)
                'users.view',

                // files
                'files.view',
                'files.manage',

                // reports / statistics (read-only)
                'reports.view',
                'statistics.view',

                // automations / recurring (view only)
                'automations.view',
                'recurring.view',

                // satisfaction
                'satisfaction.view',
            ],

            'Customer' => [
                // basic access
                'dashboard.view',

                // own tickets
                'tickets.view',

                // optionally allow file interaction
                'files.view',
            ],
        ];

        $registrar = app(\Spatie\Permission\PermissionRegistrar::class);
        $registrar->forgetCachedPermissions();

        foreach ($teamRoles as $teamKey => $roleName) {
            $team = Team::where('name', $teamKey)->first();
            if (! $team) continue;

            $role = Role::firstOrCreate([
                'name' => $roleName,
                'team_id' => $team->id,
                'guard_name' => 'web',
            ]);

            $permissions = $rolePermissions[$roleName] ?? [];

            if (in_array('*', $permissions, true)) {
                $role->syncPermissions(Permission::all());
                continue;
            }

            $resolvedPermissions = collect($permissions)
                ->map(fn ($perm) => Permission::findOrCreate($perm, 'web'));

            $role->syncPermissions($resolvedPermissions);
        }

        $registrar->forgetCachedPermissions();

    }
}
