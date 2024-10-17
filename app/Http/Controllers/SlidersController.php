<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderImagesRequest;
use App\Models\SliderSetting;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SlidersController extends Controller
{
    public function index() {
        $slider = Slider::all();
        $sliderData = SliderSetting::find(1);
        
        return view('slider', compact('sliderData', 'slider'));
    }

    public function sliderPost(Request $request) {
        
        $request->validate([
            'slider_text' => 'string:required',
            'interval' => 'integer|min:500',
        ]);

        $slider = new SliderSetting();
        $slider->slider_text = $request->input('slider_text');
        $slider->interval = $request->input('interval');
        $slider->save();

        return back()->with('success', 'Data saved successfully!');
    }

    public function sliderUpdate(Request $request) {
        $request->validate([
            'slider_text' => 'string:required',
            'interval' => 'integer|min:500',
        ]);

        $slider = SliderSetting::find(1);
        $slider->slider_text = $request->input('slider_text');
        $slider->interval = $request->input('interval');
        $slider->update();

        return back()->with('success', 'Data Updated successfully!');
    }

    public function sliderImage(SliderImagesRequest $request) {
       $validated = $request->validated();

       $slider = new Slider();
       $slider->image_alt = $validated['image_alt'];
       
       if($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images/frontend/Slider/', $filename);

        $path = 'images/frontend/Slider/' . $filename;
        $slider->image = $path;
       }

       $slider->save();

       return redirect('slider#form')->with('success', 'The slider image has been recorded');
    }
    
    public function sliderImageEdit($id) {
        $singleSlider = Slider::find($id);

        return response()->json($singleSlider, 200);
    }

    public function updateSliderImage(Request $request){
        $validated = $request->validate([
            'id' => 'required|integer',
            'image_alt' => 'required',
            'image' => 'sometimes|nullable',
        ]);
    
        $slider = Slider::find($validated['id']);
        $slider->image_alt = $validated['image_alt'];
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/frontend/Slider/', $filename);
            $path = 'images/frontend/Slider/' . $filename;
            $slider->image = $path;
        }
    
        $slider->update();
    
        return response()->json([
            'success' => true,
            'message' => 'Slider image updated successfully.',
            'image_alt' => $slider->image_alt,
            'image_url' => asset($slider->image),
            'id' => $slider->id,
        ]);
    }
     

     public function deleteSliderImage($id) {
        $slider = Slider::find($id);
        
        $dest = $slider->image;
        if (File::exists($dest)) {
            File::delete($dest);
        }
      
        $slider->delete();
        return back()->with('message', 'The data Deleted successfuly!');
     }
}
