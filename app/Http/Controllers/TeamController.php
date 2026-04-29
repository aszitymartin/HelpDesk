<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        Team::create([
            'name' => $request->name,
        ]);

        return redirect()->route('teams.index');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $team->update([
            'name' => $request->name,
        ]);

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back();
    }
}