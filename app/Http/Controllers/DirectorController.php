<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view('directors', compact('directors'));
    }

    public function create()
    {
        return view('addDirector');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $director = new Director();
        $director->name = $validated['name'];
        $director->position = $validated['position'];
        $director->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/directors/', $filename);

            $path = 'images/frontend/directors/' . $filename;
            $director->image = $path;
        }

        $director->save();

        return redirect('directors')->with('success', 'The director has been added');
    }

    public function delete($id) {
        $director = Director::find($id);
        $dest = $director->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $director->delete();

        return back()->with('success', 'The record has been delete');
    }

    public function edit($id) {
        $director = Director::find($id);

        return view('editDirector', compact('director'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string', 
            'position' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $director = Director::find($id);

        $director->name = $validated['name'];
        $director->position = $validated['position'];
        $director->image_alt = $validated['image_alt'];

        if ($director->image != $request->image && $request->hasFile('image')) {
            if (File::exists($director->image)) {
                File::delete($director->image);
            }
        }  

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/directors/', $filename);

            $path = 'images/frontend/directors/' . $filename;
            $director->image = $path;
        }

        $director->update();

        return redirect('directors')->with('success', 'The record has been updated!');
    }
}
