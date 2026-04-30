<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use \Spatie\Permission\Models\Role;
use App\Models\Team;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'set.permission.team', 'permission:users.view'])
    ->group(function () {
        Route::resource('users', UserController::class);
});


Route::middleware(['auth', 'set.permission.team'])->group(function () {
    Route::resource('teams', TeamController::class);
});

Route::post('/teams/{team}/switch', [TeamController::class, 'switch'])->name('teams.switch');


Route::middleware(['auth', 'set.permission.team'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/api/teams/{team}/roles', function (Team $team) {
    return Role::where('team_id', $team->id)
        ->select('name')
        ->orderBy('name')
        ->get();
});

require __DIR__.'/auth.php';
