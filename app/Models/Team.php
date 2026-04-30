<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'is_system'];

    protected $casts = [
        'is_system' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected static function booted()
    {
        static::updating(function ($team) {
            if ($team->is_system && $team->isDirty(['name'])) {
                throw new \RuntimeException('System team cannot be modified');
            }
        });

        static::deleting(function ($team) {
            if ($team->is_system) {
                throw new \RuntimeException('System team cannot be deleted');
            }
        });
    }

}