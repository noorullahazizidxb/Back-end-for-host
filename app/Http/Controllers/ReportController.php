<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return view('reports', compact('reports'));
    }

    public function create()
    {
        return view('addReport');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'image_alt' => 'required|string|max:125',
            'image' => 'required|image',
            'file' => 'required|mimes:pdf', 
        ]);

        $report = new Report();
        $report->title = $validated['title'];
        $report->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Reports/', $filename);

            $path = 'images/frontend/Reports/' . $filename;
            $report->image = $path;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('pdf_files/Reports/', $filename);

            $path = 'pdf_files/Reports/' . $filename;
            $report->file = $path;
        }

        $report->save();

        return redirect('reports')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $report = Report::find($id);
        $dest = $report->image;
        $file = $report->file;

        if (File::exists($dest)) {
            File::delete($dest);
        }

        if(File::exists($file)) {
            File::delete($file);
        }

        $report->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $report = Report::find($id);

        return view('editReport', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'image_alt' => 'required|string:max:125',
            'image' => 'sometimes|nullable|image',
            'file' => 'sometimes|nullable|mimes:pdf', 
        ]);

        $report = Report::find($id);

        $report->title = $validated['title'];
        $report->image_alt = $validated['image_alt'];

        if ($report->image != $request->image && $request->hasFile('image')) {
            if (File::exists($report->image)) {
                File::delete($report->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Reports/', $filename);

            $path = 'images/frontend/Reports/' . $filename;
            $report->image = $path;
        }

        if ($report->file != $request->file && $request->hasFile('file')) {
            if (File::exists($report->file)) {
                File::delete($report->file);
            }
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('pdf_files/Reports/', $filename);

            $path = 'pdf_files/Reports/' . $filename;
            $report->file = $path;
        }

        $report->update();

        return redirect('reports')->with('success', 'The record has been updated!');
    }

    public function read($id) {
        $report = Report::find($id);

        $pathToFile = $report->file;

        return response()->file($pathToFile);
    }

    public function download($id) {
        $report = Report::find($id);
        
        $pathToFile = $report->file;

        return response()->download($pathToFile, time() . '.' . 'pdf');
    }
}
