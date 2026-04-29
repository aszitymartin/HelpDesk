<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [
            'view_admin', 'view_dashboard',
            'view_tickets', 'manage_tickets',
            'view_events', 'manage_events',

            'view_categories', 'manage_categories',
            'view_labels', 'manage_labels',
            'view_templates_email', 'manage_templates_email',
            'view_templates_ticket', 'manage_templates_ticket',

            'view_teams', 'manage_teams',
            'view_permissions', 'manage_permissions',
            'view_roles', 'manage_roles',
            'view_users', 'manage_users',
            
            'view_escalates', 'manage_escalates',
            'view_satisfaction', 'manage_satisfaction',
            'view_recurring', 'manage_recurring',
            'view_automations', 'manage_automations',

            'view_reports', 'manage_reports', 'export_reports',
            'view_statistics', 'manage_statistics', 'export_statistics',

            'view_files', 'manage_files',

            'manage_service_msg',
            'manage_custom_fields',
            'manage_statuses',
            'manage_priorities',

            'manage_settings_general',
            'manage_settings_helpdesk',
            'manage_settings_looks',
            'manage_settings_email',
            'manage_settings_misc'

        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

    }
}
