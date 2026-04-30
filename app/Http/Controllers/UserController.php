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
            'password' => 'required|string|min:8|confirmed',
            'team_id'  => 'required|exists:teams,id',
            'roles'    => 'nullable|array',
            'roles.*'  => 'string|exists:roles,name'
        ]);

        $teamId = $validated['team_id'];

        $user = User::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'password'       => Hash::make($validated['password']),
            'remember_token' => Str::random(60),
            'team_id'        => $teamId,
        ]);

        $registrar = app(PermissionRegistrar::class);
        $registrar->setPermissionsTeamId($teamId);

        $roles = $validated['roles'] ?? [];

        $validRoles = Role::where('team_id', $teamId)
            ->whereIn('name', $roles)
            ->pluck('name')
            ->toArray();

        $user->syncRoles($validRoles);

        $registrar->forgetCachedPermissions();

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
            'password' => 'nullable|string|min:8|confirmed',
            'team_id'  => 'required|exists:teams,id',
            'roles'    => 'nullable|array',
            'roles.*'  => 'string|exists:roles,name'
        ]);

        $newTeamId = $validated['team_id'];

        $user->update([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'team_id' => $newTeamId,
            'password' => !empty($validated['password'])
                ? Hash::make($validated['password'])
                : $user->password,
        ]);

        $roles = $validated['roles'] ?? [];

        $roleIds = Role::where('team_id', $newTeamId)
            ->whereIn('name', $roles)
            ->pluck('id')
            ->toArray();

        /**
         * HARD RESET: remove ALL role pivots for this user
         * across ALL teams (no Spatie involvement)
         */
        \DB::table('model_has_roles')
            ->where('model_id', $user->id)
            ->where('model_type', User::class)
            ->delete();

        /**
         * Insert clean state
         */
        $insert = array_map(function ($roleId) use ($user, $newTeamId) {
            return [
                'role_id' => $roleId,
                'model_id' => $user->id,
                'model_type' => User::class,
                'team_id' => $newTeamId,
            ];
        }, $roleIds);

        if (!empty($insert)) {
            \DB::table('model_has_roles')->insert($insert);
        }

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