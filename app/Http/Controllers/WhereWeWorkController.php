<?php

namespace App\Http\Controllers;

use App\Models\WhereWeWork;
use Illuminate\Http\Request;

class WhereWeWorkController extends Controller
{
    public function index()
    {
        $whereWeWork = WhereWeWork::find(1);
        
        return view('whereWeWork', compact('whereWeWork'));
    }

    public function create()
    {
        $whereWeWork = WhereWeWork::find(1);
        return view('addWhereWeWork', compact('whereWeWork'));
    }

    public function save(Request $request)
    {
        $item = WhereWeWork::find(1);

        if (!$item) {
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
                $path = public_path() . '/images/frontend/WhereWeWork/' . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }
            // return $detail;
            // dd($request);
            $validated = $request->validate([
                'content' => 'required',
                'image_alt' => 'required|string|max:125',
                'image' => 'required|image',
            ]);

            $location = new WhereWeWork();
            $location->content = $validated['content'];
            $location->image_alt = $validated['image_alt'];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('images/frontend/WhereWeWork/', $filename);

                $path = 'images/frontend/WhereWeWork/' . $filename;
                $location->image = $path;
            }

            $location->save();

            return redirect('whereWeWork')->with('success', 'The record has been added');
        }else {
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
                $path = public_path() . '/images/frontend/WhereWeWork/' . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
                $img->setAttribute('width', '10%'); // Set the width to 200 pixels
                $img->removeattribute('style');

            }

            $validated = $request->validate([
                'content' => 'required',
                'image_alt' => 'required|string|max:125',
                'image' => 'sometimes|nullable|image',
            ]);

            $item->content = $validated['content'];
            $item->image_alt = $validated['image_alt'];

            if ($item->image != $request->image && $request->hasFile('image')) {
                if (File::exists($item->image)) {
                    File::delete($item->image);
                }
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('images/frontend/WhereWeWork/', $filename);

                $path = 'images/frontend/WhereWeWork/' . $filename;
                $item->image = $path;
            }

            $item->save();

            return redirect('whereWeWork')->with('success', 'The record has been added');
        }
    }

    public function edit($id)
    {
        $whereWeWork = WhereWeWork::find($id);

        return view('editWhereWeWork', compact('whereWeWork'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'sometimes|nullable|image',
        ]);

        $teamMember = WhereWeWork::find($id);

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
            $file->move('images/frontend/WhereWeWork/', $filename);

            $path = 'images/frontend/WhereWeWork/' . $filename;
            $teamMember->image = $path;
        }

        $teamMember->update();

        return redirect('team')->with('success', 'The record has been updated!');
    }
}
