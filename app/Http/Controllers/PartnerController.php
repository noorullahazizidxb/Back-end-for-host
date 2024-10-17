<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('partners', compact('partners'));
    }

    public function create()
    {
        return view('addPartner');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'link' => 'required|url',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
        ]);

        $partner = new Partner();
        $partner->name = $validated['name'];
        $partner->link = $validated['link'];
        $partner->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Partners/', $filename);

            $path = 'images/frontend/Partners/' . $filename;
            $partner->image = $path;
        }

        $partner->save();

        return redirect('partners')->with('success', 'The record has been added');
    }

    public function delete($id) {
        $partner = Partner::find($id);
        $dest = $partner->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $partner->delete();

        return back()->with('success', 'The record has been delete');
    }

    public function edit($id) {
        $partner = Partner::find($id);

        return view('editPartner', compact('partner'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string', 
            'link' => 'required|url',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $partner = Partner::find($id);

        $partner->name = $validated['name'];
        $partner->link = $validated['link'];
        $partner->image_alt = $validated['image_alt'];

        if ($partner->image != $request->image && $request->hasFile('image')) {
            if (File::exists($partner->image)) {
                File::delete($partner->image);
            }
        }  

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Partners/', $filename);

            $path = 'images/frontend/Partners/' . $filename;
            $partner->image = $path;
        }

        $partner->update();

        return redirect('partners')->with('success', 'The record has been updated!');
    }
}
