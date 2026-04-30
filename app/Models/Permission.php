<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $casts = [
        'is_system' => 'boolean',
    ];

    protected static function booted()
    {
        static::updating(function ($permission) {
            if ($permission->is_system) {
                throw new \RuntimeException('System permission is immutable');
            }
        });

        static::deleting(function ($permission) {
            if ($permission->is_system) {
                throw new \RuntimeException('System permission cannot be deleted');
            }
        });
    }
}