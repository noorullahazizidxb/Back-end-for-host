<?php

namespace App\Http\Controllers;

use App\Models\NewsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class NewsInfoController extends Controller
{
    public function index()
    {
        $newsInfo = NewsInfo::all();

        return view('newsInfo', compact('newsInfo'));
    }

    public function create()
    {
        $currentYear = date('Y');
        $yearOptions = [];

        for ($year = $currentYear; $year >= 2000; $year--) {
            $yearOptions[$year] = $year;
        }

        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $months[$month] = date('F', mktime(0, 0, 0, $month, 1, 2023));
        }

        return view('addNewsInfo', compact('yearOptions', 'currentYear', 'months'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'start_month' => 'required|string',
            'end_month' => 'required|string',
            'year' => 'required|string',
            'image_alt' => 'required|string',
            'image' => 'required|image',
            'file' => 'required|mimes:pdf', 
        ]);

        $newsInfo = new NewsInfo();
        $newsInfo->start_month = $validated['start_month'];
        $newsInfo->end_month = $validated['end_month'];
        $newsInfo->year = $validated['year'];
        $newsInfo->image_alt = $validated['image_alt'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/NewsInfo/', $filename);

            $path = 'images/frontend/NewsInfo/' . $filename;
            $newsInfo->image = $path;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('pdf_files/newsInfo/', $filename);

            $path = 'pdf_files/newsInfo/' . $filename;
            $newsInfo->file = $path;
        }

        $newsInfo->save();

        return redirect('newsInfo')->with('success', 'The record has been added');
    }

    public function delete($id)
    {
        $newsInfo = NewsInfo::find($id);
        $dest = $newsInfo->image;
        $file = $newsInfo->file;

        if (File::exists($dest)) {
            File::delete($dest);
        }

        if(File::exists($file)) {
            File::delete($file);
        }

        $newsInfo->delete();

        return back()->with('success', 'The record has been deleted');
    }

    public function edit($id)
    {
        $currentYear = date('Y');
        $yearOptions = [];

        for ($year = $currentYear; $year >= 2000; $year--) {
            $yearOptions[$year] = $year;
        }

        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $months[$month] = date('F', mktime(0, 0, 0, $month, 1, 2023));
        }

        $newsInfo = NewsInfo::find($id);

        return view('editNewsInfo', compact('newsInfo', 'months', 'currentYear', 'yearOptions'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_month' => 'required|string',
            'end_month' => 'required|string',
            'year' => 'required|string',
            'image_alt' => 'required|string',
            'image' => 'sometimes|nullable|image',
            'file' => 'sometimes|nullable|mimes:pdf', 
        ]);

        $newsInfo = NewsInfo::find($id);

        $newsInfo->start_month = $validated['start_month'];
        $newsInfo->end_month = $validated['end_month'];
        $newsInfo->year = $validated['year'];
        $newsInfo->image_alt = $validated['image_alt'];

        if ($newsInfo->image != $request->image && $request->hasFile('image')) {
            if (File::exists($newsInfo->image)) {
                File::delete($newsInfo->image);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/NewsInfo/', $filename);

            $path = 'images/frontend/NewsInfo/' . $filename;
            $newsInfo->image = $path;
        }

        if ($newsInfo->file != $request->file && $request->hasFile('file')) {
            if (File::exists($newsInfo->file)) {
                File::delete($newsInfo->file);
            }
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('pdf_files/newsInfo/', $filename);

            $path = 'pdf_files/newsInfo/' . $filename;
            $newsInfo->file = $path;
        }

        $newsInfo->update();

        return redirect('newsInfo')->with('success', 'The record has been updated!');
    }

    public function read($id) {
        $newsInfo = NewsInfo::find($id);

        $pathToFile = $newsInfo->file;

        return response()->file($pathToFile);
    }

    public function download($id) {
        $newsInfo = NewsInfo::find($id);
        
        $pathToFile = $newsInfo->file;

        return response()->download($pathToFile, time() . '.' . 'pdf');
    }
}
