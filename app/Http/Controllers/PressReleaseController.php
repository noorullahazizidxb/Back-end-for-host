<?php

namespace App\Http\Controllers;

use App\Models\PressRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PressReleaseController extends Controller
{
    public function index()
    {
        $pressRelease = PressRelease::all();

        return view('pressRelease', compact('pressRelease'));
    }

    public function create()
    {
        return view('addPressRelease');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'content' => 'required',
            'image_alt' => 'required|string',
            'image' => 'required|image',
        ]);

        $pressRelease = new PressRelease();
        $pressRelease->date = $validated['date'];
        $pressRelease->content = $validated['content'];
        $pressRelease->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/PressRelease/', $filename);

            $path = 'images/frontend/PressRelease/' . $filename;
            $pressRelease->image = $path;
        }

        $pressRelease->save();

        return redirect('pressRelease')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $pressRelease = PressRelease::find($id);
        $dest = $pressRelease->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $pressRelease->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $pressRelease = PressRelease::find($id);

        return view('editPressRelease', compact('pressRelease'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'content' => 'required',
            'image_alt' => 'required|string',
            'image' => 'sometimes|nullable|image',
        ]);

        $pressRelease = PressRelease::find($id);

        $pressRelease->date = $validated['date'];
        $pressRelease->content = $validated['content'];
        $pressRelease->image_alt = $validated['image_alt'];

        if ($pressRelease->image != $request->image && $request->hasFile('image')) {
            if (File::exists($pressRelease->image)) {
                File::delete($pressRelease->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/PressRelease/', $filename);

            $path = 'images/frontend/PressRelease/' . $filename;
            $pressRelease->image = $path;
        }
        
        $pressRelease->update();

        return redirect('pressRelease')->with('success', 'The record has been updated!');
    }
}
