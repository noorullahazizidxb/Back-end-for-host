<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\DocumentaryVideosController;
use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\NewsInfoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WhereWeWorkController;
use App\Http\Controllers\WhatWeDoCategoryController;
use App\Http\Controllers\WhatWeDoController;

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginpost');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/slider/{id?}', [SlidersController::class, 'index']);
    Route::post('/slider', [SlidersController::class, 'sliderPost']);
    Route::post('/sliderUpdate', [SlidersController::class, 'sliderUpdate']);
    Route::post('/sliderImage', [SlidersController::class, 'sliderImage']);
    Route::get('/deleteSliderImage/{id}', [SlidersController::class, 'deleteSliderImage']);
    Route::get('/updateSliderImage/{id}', [SlidersController::class, 'sliderImageEdit']);
    Route::post('/updateSliderImage', [SlidersController::class, 'updateSliderImage'])->name('updateSliderImage');

    Route::get('directors', [DirectorController::class, 'index']);
    Route::get('addDirector', [DirectorController::class, 'create']);
    Route::post('addDirector', [DirectorController::class, 'save']);
    Route::get('deleteDirector/{id}', [DirectorController::class, 'delete']);
    Route::get('updateDirector/{id}', [DirectorController::class, 'edit']);
    Route::post('updateDirector/{id}', [DirectorController::class, 'update']);

    Route::get('team', [TeamController::class, 'index']);
    Route::get('addTeamMember', [TeamController::class, 'create']);
    Route::post('addTeamMember', [TeamController::class, 'save']);
    Route::get('deleteTeamMember/{id}', [TeamController::class, 'delete']);
    Route::get('updateTeamMember/{id}', [TeamController::class, 'edit']);
    Route::post('updateTeamMember/{id}', [TeamController::class, 'update']);

    Route::get('photoGallery', [PhotoGalleryController::class, 'index']);
    Route::get('addGalleryPhoto', [PhotoGalleryController::class, 'create']);
    Route::post('addGalleryPhoto', [PhotoGalleryController::class, 'save']);
    Route::get('deleteGalleryPhoto/{id}', [PhotoGalleryController::class, 'delete']);
    Route::get('updateGalleryPhoto/{id}', [PhotoGalleryController::class, 'edit']);
    Route::post('updateGalleryPhoto/{id}', [PhotoGalleryController::class, 'update']);

    Route::get('documentaryVideos', [DocumentaryVideosController::class, 'index']);
    Route::get('addDocumentaryVideo', [DocumentaryVideosController::class, 'create']);
    Route::post('addDocumentaryVideo', [DocumentaryVideosController::class, 'save']);
    Route::get('deleteDocumentaryVideo/{id}', [DocumentaryVideosController::class, 'delete']);
    Route::get('updateDocumentaryVideo/{id}', [DocumentaryVideosController::class, 'edit']);
    Route::post('updateDocumentaryVideo/{id}', [DocumentaryVideosController::class, 'update']);

    Route::get('pressRelease', [PressReleaseController::class, 'index']);
    Route::get('addPressRelease', [PressReleaseController::class, 'create']);
    Route::post('addPressRelease', [PressReleaseController::class, 'save']);
    Route::get('deletePressRelease/{id}', [PressReleaseController::class, 'delete']);
    Route::get('updatePressRelease/{id}', [PressReleaseController::class, 'edit']);
    Route::post('updatePressRelease/{id}', [PressReleaseController::class, 'update']);

    Route::get('newsInfo', [NewsInfoController::class, 'index']);
    Route::get('addNewsInfo', [NewsInfoController::class, 'create']);
    Route::post('addNewsInfo', [NewsInfoController::class, 'save']);
    Route::get('deleteNewsInfo/{id}', [NewsInfoController::class, 'delete']);
    Route::get('updateNewsInfo/{id}', [NewsInfoController::class, 'edit']);
    Route::post('updateNewsInfo/{id}', [NewsInfoController::class, 'update']);
    Route::get('readNewsInfo/{id}', [NewsInfoController::class, 'read']);
    Route::get('downloadNewsInfo/{id}', [NewsInfoController::class, 'download']);

    Route::get('reports', [ReportController::class, 'index']);
    Route::get('addReport', [ReportController::class, 'create']);
    Route::post('addReport', [ReportController::class, 'save']);
    Route::get('deleteReport/{id}', [ReportController::class, 'delete']);
    Route::get('updateReport/{id}', [ReportController::class, 'edit']);
    Route::post('updateReport/{id}', [ReportController::class, 'update']);
    Route::get('readReport/{id}', [ReportController::class, 'read']);
    Route::get('downloadReport/{id}', [ReportController::class, 'download']);

    Route::get('careers', [CareerController::class, 'index']);
    Route::get('addCareer', [CareerController::class, 'create']);
    Route::post('addCareer', [CareerController::class, 'save']);
    Route::get('deleteCareer/{id}', [CareerController::class, 'delete']);
    Route::get('updateCareer/{id}', [CareerController::class, 'edit']);
    Route::post('updateCareer/{id}', [CareerController::class, 'update']);

    Route::get('partners', [PartnerController::class, 'index']);
    Route::get('addPartner', [PartnerController::class, 'create']);
    Route::post('addPartner', [PartnerController::class, 'save']);
    Route::get('deletePartner/{id}', [PartnerController::class, 'delete']);
    Route::get('updatePartner/{id}', [PartnerController::class, 'edit']);
    Route::post('updatePartner/{id}', [PartnerController::class, 'update']);

    Route::get('comments', [CommentController::class, 'index']);
    Route::get('deleteMessage/{id}', [CommentController::class, 'delete']);

    Route::get('whereWeWork', [WhereWeWorkController::class, 'index']);
    Route::get('addWhereWeWork', [WhereWeWorkController::class, 'create']);
    Route::post('addWhereWeWork', [WhereWeWorkController::class, 'save']);
    Route::post('updateWhereWeWork/{id}', [WhereWeWorkController::class, 'update']);

    Route::get('whatWeDoCategories', [WhatWeDoCategoryController::class, 'index']);
    Route::get('addWhatWeDoCategory', [WhatWeDoCategoryController::class, 'create']);
    Route::post('addWhatWeDoCategory', [WhatWeDoCategoryController::class, 'save']);
    Route::get('deleteWhatWeDoCategory/{id}', [WhatWeDoCategoryController::class, 'delete']);
    Route::get('updateWhatWeDoCategory/{id}', [WhatWeDoCategoryController::class, 'edit']);
    Route::post('updateWhatWeDoCategory/{id}', [WhatWeDoCategoryController::class, 'update']);

    Route::get('whatWeDoContent', [WhatWeDoController::class, 'index']);
    Route::get('addWhatWeDo', [WhatWeDoController::class, 'create']);
    Route::post('addWhatWeDo', [WhatWeDoController::class, 'save']);
    Route::get('deleteWhatWeDo/{id}', [WhatWeDoController::class, 'delete']);
    Route::get('updateWhatWeDo/{id}', [WhatWeDoController::class, 'edit']);
    Route::post('updateWhatWeDo/{id}', [WhatWeDoController::class, 'update']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});