<?php

namespace App\Http\Controllers;

use App\Models\WhatWeDo;
use App\Models\WhatWeDoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhatWeDoController extends Controller
{
    public function index()
    {
        $whatWeDo = WhatWeDo::all();

        return view('whatWeDoContent', compact('whatWeDo'));
    }

    public function create()
    {
        $categories = WhatWeDoCategory::select('id', 'name')->get();

        return view('addWhatWeDo', compact('categories'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string',
                'starter_text' => 'required|string',
                'starter_image' => 'required|image',
                'category_id' => 'required|exists:what_we_do_categories,id',
                'content' => 'required',
            ],
            [
                'category_id.exists' => 'Please choose a category.',
            ],
        );

        $detail = $request->content;

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');

            [$type, $data] = explode(';', $data);
            [, $data] = explode(',', $data);

            $data = base64_decode($data);
            $image_name = time() . $k . '.png';
            $path = public_path() . '\images\frontend\WhatWeDo\\' . $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }
        $whatWeDo = new WhatWeDo();
        $whatWeDo->title = $validated['title'];
        $whatWeDo->category_id = $validated['category_id'];
        $whatWeDo->starter_text = $validated['starter_text'];
        $whatWeDo->content = $detail;

        if ($request->hasFile('starter_image')) {
            $file = $request->file('starter_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/WhatWeDo/', $filename);

            $path = 'images/frontend/WhatWeDo/' . $filename;
            $whatWeDo->starter_image = $path;
        }

        $whatWeDo->save();

        return redirect('whatWeDoContent')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $whatWeDo = WhatWeDo::find($id);
        $dest = $whatWeDo->starter_image;

        if (File::exists($dest)) {
            File::delete($dest);
        }

        $whatWeDo->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $whatWeDo = WhatWeDo::find($id);
        $categories = WhatWeDoCategory::select('id', 'name')->get();

        return view('editWhatWeDo', compact('whatWeDo', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string',
                'starter_text' => 'required|string',
                'starter_image' => 'sometimes|nullable|image',
                'category_id' => 'required|exists:what_we_do_categories,id',
                'content' => 'required',
            ],
            [
                'category_id.exists' => 'Please choose a category.',
            ],
        );

        $detail = $request->content;

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');

            [$type, $data] = explode(';', $data);
            [, $data] = explode(',', $data);

            $data = base64_decode($data);
            $image_name = time() . $k . '.png';
            $path = public_path() . '\images\frontend\WhatWeDo\\' . $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }
        $whatWeDo = WhatWeDo::find($id);
        $whatWeDo->title = $validated['title'];
        $whatWeDo->category_id = $validated['category_id'];
        $whatWeDo->starter_text = $validated['starter_text'];
        $whatWeDo->content = $detail;

        if ($whatWeDo->starter_image != $request->starter_image && $request->hasFile('starter_image')) {
            if (File::exists($whatWeDo->starter_image)) {
                File::delete($whatWeDo->starter_image);
            }
        }

        if ($request->hasFile('starter_image')) {
            $file = $request->file('starter_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/WhatWeDo/', $filename);

            $path = 'images/frontend/WhatWeDo/' . $filename;
            $whatWeDo->starter_image = $path;
        }

        $whatWeDo->update();

        return redirect('whatWeDoContent')->with('success', 'The record has been updated!');
    }
}
