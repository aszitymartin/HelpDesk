<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('team')->get();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        $teams = Team::all();
        return view('users.create', compact('teams'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed|required_with:password_confirmation',
            'team_id'  => 'required|exists:teams,id',
            'roles'    => 'nullable|array',
            'roles.*'  => 'string|exists:roles,name'
        ]);

        $teamId = $validated['team_id'];
        $roles  = $validated['roles'] ?? [];

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'remember_token' => Str::random(60),
            'team_id'  => $teamId,
        ]);

        app(PermissionRegistrar::class)
            ->setPermissionsTeamId($teamId);

        $validRoles = Role::where('team_id', $teamId)
            ->whereIn('name', $roles)
            ->pluck('name')
            ->toArray();

        $user->syncRoles($validRoles);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()->route('users.index');
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
        $validated = $request->validate([
            'name'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed|required_with:password_confirmation',
            'team_id'  => 'required|exists:teams,id',
            'roles'    => 'nullable|array',
            'roles.*'  => 'string|exists:roles,name'
        ]);

        $oldTeamId = $user->team_id;
        $newTeamId = $validated['team_id'];

        if ($oldTeamId != $newTeamId) {
            $user->roles()->detach();
        }

        $data = [
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'team_id' => $newTeamId,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        app(PermissionRegistrar::class)
            ->setPermissionsTeamId($newTeamId);

        $roles = $validated['roles'] ?? [];

        $validRoles = Role::where('team_id', $newTeamId)
            ->whereIn('name', $roles)
            ->pluck('name')
            ->toArray();

        $user->syncRoles($validRoles);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }

}