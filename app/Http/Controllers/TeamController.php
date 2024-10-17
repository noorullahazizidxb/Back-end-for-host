<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('team', compact('team'));
    }

    public function create()
    {
        return view('addTeamMember');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $director = new Team();
        $director->name = $validated['name'];
        $director->position = $validated['position'];
        $director->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/ManagementTeam/', $filename);

            $path = 'images/frontend/ManagementTeam/' . $filename;
            $director->image = $path;
        }

        $director->save();

        return redirect('team')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $teamMember = Team::find($id);
        $dest = $teamMember->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $teamMember->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $teamMember = Team::find($id);

        return view('editTeamMember', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $teamMember = Team::find($id);

        $teamMember->name = $validated['name'];
        $teamMember->position = $validated['position'];
        $teamMember->image_alt = $validated['image_alt'];

        if ($teamMember->image != $request->image && $request->hasFile('image')) {
            if (File::exists($teamMember->image)) {
                File::delete($teamMember->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/ManagementTeam/', $filename);

            $path = 'images/frontend/ManagementTeam/' . $filename;
            $teamMember->image = $path;
        }

        $teamMember->update();

        return redirect('team')->with('success', 'The record has been updated!');
    }
}
