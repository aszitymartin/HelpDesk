<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $casts = [
        'is_system' => 'boolean',
    ];

    protected static function booted()
    {
        static::updating(function ($role) {
            if ($role->is_system) {
                throw new \RuntimeException('System role is immutable');
            }
        });

        static::deleting(function ($role) {
            if ($role->is_system) {
                throw new \RuntimeException('System role cannot be deleted');
            }
        });
    }
}