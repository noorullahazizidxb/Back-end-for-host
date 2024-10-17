<?php

namespace App\Http\Controllers;

use App\Models\DocumentaryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentaryVideosController extends Controller
{
    public function index()
    {
        $documentaryVideos = DocumentaryVideo::all();

        return view('documentaryVideos', compact('documentaryVideos'));
    }

    public function create()
    {
        return view('addDocumentaryVideo');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'video_link' => 'required|url',
            'image' => 'required|image',
        ]);

        $documentaryVideo = new DocumentaryVideo();
        $documentaryVideo->title = $validated['title'];
        $documentaryVideo->video_link = $validated['video_link'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/DocumentaryVideos/', $filename);

            $path = 'images/frontend/DocumentaryVideos/' . $filename;
            $documentaryVideo->image = $path;
        }

        $documentaryVideo->save();

        return redirect('documentaryVideos')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $documentaryVideo = DocumentaryVideo::find($id);
        $dest = $documentaryVideo->image;

        if (File::exists($dest)) {
            File::delete($dest);
        }
        $documentaryVideo->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $documentaryVideo = DocumentaryVideo::find($id);

        return view('editDocumentaryVideo', compact('documentaryVideo'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'video_link' => 'required|url',
            'image' => 'sometimes|nullable|image',
        ]);

        $documentaryVideo = DocumentaryVideo::find($id);

        $documentaryVideo->title = $validated['title'];
        $documentaryVideo->video_link = $validated['video_link'];

        if ($documentaryVideo->image != $request->image && $request->hasFile('image')) {
            if (File::exists($documentaryVideo->image)) {
                File::delete($documentaryVideo->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/DocumentaryVideos/', $filename);

            $path = 'images/frontend/DocumentaryVideos/' . $filename;
            $documentaryVideo->image = $path;
        }

        $documentaryVideo->update();

        return redirect('documentaryVideos')->with('success', 'The record has been updated!');
    }
}
