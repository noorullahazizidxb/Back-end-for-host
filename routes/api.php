<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendPagesController;
use App\Http\Controllers\CommentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('sliders', [FrontendPagesController::class, 'slider']);
Route::get('sliderSetting', [FrontendPagesController::class, 'sliderSetting']);
Route::get('pressRelease', [FrontendPagesController::class, 'pressRelease']);
Route::get('directors', [FrontendPagesController::class, 'directors']);
Route::get('team', [FrontendPagesController::class, 'team']);
Route::get('partners', [FrontendPagesController::class, 'partners']);
Route::get('newsInfo', [FrontendPagesController::class, 'newsInfo']);
Route::get('readNewsInfo/{id}', [FrontendPagesController::class, 'readNewsInfo']);
Route::get('/downloadNewsInfo/{id}', [FrontendPagesController::class, 'downloadNewsInfo']);
Route::get('reports', [FrontendPagesController::class, 'reports']);
Route::get('readReport/{id}', [FrontendPagesController::class, 'readReport']);
Route::get('/downloadReport/{id}', [FrontendPagesController::class, 'downloadReport']);
Route::get('gallery', [FrontendPagesController::class, 'gallery']);
Route::get('documentaryVideos', [FrontendPagesController::class, 'documentaryVideos']);
Route::get('career', [FrontendPagesController::class, 'career']);
Route::get('whereWeWork', [FrontendPagesController::class, 'whereWeWork']);
Route::get('whatWeDoCategory', [FrontendPagesController::class, 'whatWeDoCategory']);
Route::get('categories', [FrontendPagesController::class, 'categories']);
Route::get('{slug}', [FrontendPagesController::class, 'whatWeDo']);

Route::post('storeMessage', [CommentController::class, 'save']);

