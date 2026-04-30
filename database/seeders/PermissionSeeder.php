<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [

            // system
            'admin.view',
            'dashboard.view',

            // tickets
            'tickets.view',
            'tickets.manage',
            'tickets.*',

            // events
            'events.view',
            'events.manage',
            'events.*',

            // categories
            'categories.view',
            'categories.manage',
            'categories.*',

            // labels
            'labels.view',
            'labels.manage',
            'labels.*',

            // templates_email
            'templates_email.view',
            'templates_email.manage',
            'templates_email.*',

            // templates_ticket
            'templates_ticket.view',
            'templates_ticket.manage',
            'templates_ticket.*',

            // teams
            'teams.view',
            'teams.manage',
            'teams.*',

            // permissions
            'permissions.view',
            'permissions.manage',
            'permissions.*',

            // roles
            'roles.view',
            'roles.manage',
            'roles.*',

            // users
            'users.view',
            'users.manage',
            'users.*',

            // escalates
            'escalates.view',
            'escalates.manage',
            'escalates.*',

            // satisfaction
            'satisfaction.view',
            'satisfaction.manage',
            'satisfaction.*',

            // recurring
            'recurring.view',
            'recurring.manage',
            'recurring.*',

            // automations
            'automations.view',
            'automations.manage',
            'automations.*',

            // reports
            'reports.view',
            'reports.manage',
            'reports.export',
            'reports.*',

            // statistics
            'statistics.view',
            'statistics.manage',
            'statistics.export',
            'statistics.*',

            // files
            'files.view',
            'files.manage',
            'files.*',

            // service messages
            'service_msg.manage',
            'service_msg.*',

            // custom fields
            'custom_fields.manage',
            'custom_fields.*',

            // statuses
            'statuses.manage',
            'statuses.*',

            // priorities
            'priorities.manage',
            'priorities.*',

            // settings
            'settings.general.manage',
            'settings.helpdesk.manage',
            'settings.looks.manage',
            'settings.email.manage',
            'settings.misc.manage',
            'settings.*',
        ];

        foreach ($permissions as $perm) {
            Permission::updateOrCreate(
                [
                    'name' => $perm,
                    'guard_name' => 'web',
                ],
                [
                    'is_system' => true,
                ]
            );
        }

    }
}
