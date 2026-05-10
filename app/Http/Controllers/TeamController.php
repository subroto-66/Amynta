<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController
{
    public function index()
    {
        $teams = Team::orderBy('id', 'desc')->get();

        return Inertia('Team/Index', ['teams' => $teams]);
    }

    public function create()
    {
        return Inertia('Team/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required',
            'mail' => 'nullable',
            'instagram_link' => 'nullable',
            'twitter_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'status' => 'required',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('team'), $imageName);
        }

        $team = new Team;
        $team->name = $request->name;
        $team->position = $request->position;
        $team->image = $imageName;
        $team->status = $request->status;
        $team->mail = $request->mail;
        $team->description = $request->description;
        $team->instagram_link = $request->instagram_link;
        $team->twitter_link = $request->twitter_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->save();

        return redirect()->route('teams.index')->with('message', 'Team member created successfully.');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return Inertia('Team/Edit', ['team' => $team]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
            'mail' => 'nullable',
            'description' => 'nullable',
            'instagram_link' => 'nullable',
            'twitter_link' => 'nullable',
            'linkedin_link' => 'nullable',
        ]);

        $team = Team::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($team->image) {
                $imagePath = public_path('team/'.$team->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('team'), $imageName);

            $team->image = $imageName;
        }

        $team->name = $request->name;
        $team->position = $request->position;
        $team->status = $request->status;
        $team->mail = $request->mail;
        $team->description = $request->description;
        $team->instagram_link = $request->instagram_link;
        $team->twitter_link = $request->twitter_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->save();

        return redirect()->route('teams.index')->with('message', 'Team member updated successfully.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image) {
            $imagePath = public_path('team/'.$team->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $team->delete();

        return redirect()->route('teams.index')->with('message', 'Team deleted successfully.');
    }
}
