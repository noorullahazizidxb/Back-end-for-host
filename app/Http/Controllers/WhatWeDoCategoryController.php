<?php

namespace App\Http\Controllers;

use App\Models\WhatWeDoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhatWeDoCategoryController extends Controller
{
    public function index()
    {
        $whatWeDoCategories = WhatWeDoCategory::all();

        return view('whatWeDoCategories', compact('whatWeDoCategories'));
    }

    public function create()
    {
        return view('addWhatWeDoCategory');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $slug = strtolower($validated['name']);

        // Replace non-alphanumeric characters with a hyphen
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

        // Trim leading/trailing hyphens
        $slug = trim($slug, '-');

        $whatWeDoCategory = new WhatWeDoCategory();
        $whatWeDoCategory->name = $validated['name'];
        $whatWeDoCategory->slug = $slug;
        $whatWeDoCategory->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/WhatWeDoCategories/', $filename);

            $path = 'images/frontend/WhatWeDoCategories/' . $filename;
            $whatWeDoCategory->image = $path;
        }

        $whatWeDoCategory->save();

        return redirect('whatWeDoCategories')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $whatWeDoCategory = WhatWeDoCategory::find($id);
        $dest = $whatWeDoCategory->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $whatWeDoCategory->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $whatWeDoCategory = WhatWeDoCategory::find($id);

        return view('editWhatWeDoCategory', compact('whatWeDoCategory'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $slug = strtolower($validated['name']);

        // Replace non-alphanumeric characters with a hyphen
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);

        // Trim leading/trailing hyphens
        $slug = trim($slug, '-');

        $whatWeDoCategory = WhatWeDoCategory::find($id);

        $whatWeDoCategory->name = $validated['name'];
        $whatWeDoCategory->slug = $slug;
        $whatWeDoCategory->image_alt = $validated['image_alt'];

        if ($whatWeDoCategory->image != $request->image && $request->hasFile('image')) {
            if (File::exists($whatWeDoCategory->image)) {
                File::delete($whatWeDoCategory->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/WhatWeDoCategories/', $filename);

            $path = 'images/frontend/WhatWeDoCategories/' . $filename;
            $whatWeDoCategory->image = $path;
        }

        $whatWeDoCategory->update();

        return redirect('whatWeDoCategories')->with('success', 'The record has been updated!');
    }
}
