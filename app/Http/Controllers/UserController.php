<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('team')->get();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $teams = Team::all();

        // set context to user's team before loading roles
        app(PermissionRegistrar::class)
            ->setPermissionsTeamId($user->team_id);

        $roles = Role::where('team_id', $user->team_id)->get();

        return view('users.edit', compact('user', 'teams', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $oldTeamId = $user->team_id;
        $newTeamId = $request->team_id;

        // If team changes → wipe roles BEFORE anything else
        if ($oldTeamId != $newTeamId) {
            $user->roles()->detach();
        }

        $user->update([
            'team_id' => $newTeamId,
        ]);

        if ($newTeamId) {
            app(PermissionRegistrar::class)
                ->setPermissionsTeamId($newTeamId);

            // Only assign roles if they belong to this team
            if ($request->roles) {
                $validRoles = Role::where('team_id', $newTeamId)
                    ->whereIn('name', $request->roles)
                    ->pluck('name')
                    ->toArray();

                $user->syncRoles($validRoles);
            }
        }

        return redirect()->back();
    }

}