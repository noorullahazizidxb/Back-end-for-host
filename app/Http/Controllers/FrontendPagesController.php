<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SliderSetting;
use App\Models\PressRelease;
use App\Models\Director;
use App\Models\Team;
use App\Models\Partner;
use App\Models\NewsInfo;
use App\Models\Report;
use App\Models\PhotoGallery;
use App\Models\DocumentaryVideo;
use App\Models\Career;
use App\Models\WhereWeWork;
use App\Models\WhatWeDoCategory;
use App\Models\WhatWeDo;

class FrontendPagesController extends Controller
{
    public function slider()
    {
        $sliders = Slider::all();

        return response()->json($sliders, 200);
    }

    public function sliderSetting()
    {
        $sliderSetting = SliderSetting::find(1);

        return response()->json($sliderSetting, 200);
    }

    public function pressRelease()
    {
        $pressRelease = PressRelease::all();

        return response()->json($pressRelease, 200);
    }

    public function directors()
    {
        $directors = Director::all();

        return response()->json($directors, 200);
    }

    public function team()
    {
        $team = Team::all();

        return response()->json($team, 200);
    }

    public function partners()
    {
        $partners = Partner::all();

        return response()->json($partners, 200);
    }

    public function newsInfo()
    {
        $newsInfo = NewsInfo::all();

        return response()->json($newsInfo, 200);
    }

    public function readNewsInfo($id)
    {
        $newsInfo = NewsInfo::find($id);

        $pathToFile = $newsInfo->file;

        return response()->file($pathToFile);
    }

    public function downloadNewsInfo($id)
    {
        $newsInfo = NewsInfo::find($id);

        $pathToFile = $newsInfo->file;

        return response()->download($pathToFile, time() . '.' . 'pdf');
    }

    public function reports()
    {
        $reports = Report::all();

        return response()->json($reports, 200);
    }

    public function readReport($id)
    {
        $report = Report::find($id);

        $pathToFile = $report->file;

        return response()->file($pathToFile);
    }

    public function downloadReport($id)
    {
        $report = Report::find($id);

        $pathToFile = $report->file;

        return response()->download($pathToFile, time() . '.' . 'pdf');
    }

    public function gallery()
    {
        $gallery = PhotoGallery::all();

        return response()->json($gallery, 200);
    }

    public function documentaryVideos()
    {
        $video = DocumentaryVideo::all();

        return response()->json($video, 200);
    }

    public function career()
    {
        $career = Career::all();

        return response()->json($career, 200);
    }

    public function whereWeWork()
    {
        $whereWeWork = WhereWeWork::all();

        return response()->json($whereWeWork, 200);
    }

    public function whatWeDoCategory()
    {
        $whatWeDoCategory = WhatWeDoCategory::all();

        return response()->json($whatWeDoCategory, 200);
    }

    public function whatWeDo($slug)
    {
        $item = WhatWeDoCategory::where('slug', $slug)->first();
        if ($item) {
            $whatWeDo = WhatWeDo::where('category_id', $item->id)->get();

            return response()->json($whatWeDo, 200);
        } else {
            return response()->json([
                'error' => [
                    'message' => 'Page not found!',
                    'code' => 404
                ]
            ], 404);
        }
    }

    public function categories()
    {
        $categories = WhatWeDoCategory::select('name', 'slug')->get();

        return response()->json($categories, 200);
    }
}
