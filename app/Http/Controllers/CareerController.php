<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();

        return view('careers', compact('careers'));
    }

    public function create()
    {
        return view('addCareer');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string',
            'link' => 'required|url',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $career = new Career();
        $career->title = $validated['title'];
        $career->closing_date = $validated['date'];
        $career->link = $validated['link'];
        $career->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Careers/', $filename);

            $path = 'images/frontend/Careers/' . $filename;
            $career->image = $path;
        }

        $career->save();

        return redirect('careers')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $career = Career::find($id);
        $dest = $career->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $career->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $career = Career::find($id);

        return view('editCareer', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'title' => 'required|string',
            'link' => 'required|url',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);
        $career = Career::find($id);

        $career->title = $validated['title'];
        $career->closing_date = $validated['date'];
        $career->link = $validated['link'];
        $career->image_alt = $validated['image_alt'];

        if ($career->image != $request->image && $request->hasFile('image')) {
            if (File::exists($career->image)) {
                File::delete($career->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Careers/', $filename);

            $path = 'images/frontend/Careers/' . $filename;
            $career->image = $path;
        }
        
        $career->update();

        return redirect('careers')->with('success', 'The record has been updated!');
    }
}
