<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        $photoGallery = PhotoGallery::all();

        return view('photoGallery', compact('photoGallery'));
    }

    public function create()
    {
        return view('addGalleryPhoto');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $galleryPhoto = new PhotoGallery();
        $galleryPhoto->description = $validated['description'];
        $galleryPhoto->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/PhotoGallery/', $filename);

            $path = 'images/frontend/PhotoGallery/' . $filename;
            $galleryPhoto->image = $path;
        }

        $galleryPhoto->save();

        return redirect('photoGallery')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $galleryPhoto = PhotoGallery::find($id);
        $dest = $galleryPhoto->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $galleryPhoto->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $galleryPhoto = PhotoGallery::find($id);

        return view('editGalleryPhoto', compact('galleryPhoto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $galleryPhoto = PhotoGallery::find($id);

        $galleryPhoto->description = $validated['description'];
        $galleryPhoto->image_alt = $validated['image_alt'];

        if ($galleryPhoto->image != $request->image && $request->hasFile('image')) {
            if (File::exists($galleryPhoto->image)) {
                File::delete($galleryPhoto->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/PhotoGallery/', $filename);

            $path = 'images/frontend/PhotoGallery/' . $filename;
            $galleryPhoto->image = $path;
        }

        $galleryPhoto->update();

        return redirect('photoGallery')->with('success', 'The record has been updated!');
    }
}
