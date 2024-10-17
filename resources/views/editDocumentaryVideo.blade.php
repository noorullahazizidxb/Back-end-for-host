@extends('components.main')

@section('title', 'Rupdani Foundation - Edit Documentary Video')

@section('main-container')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Documentary Video</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="documentaryVideos">Documentary Videos</a></li>
                        <li class="active">Edit a Documentary Video</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Edit the Documentary Video</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{ url('updateDocumentaryVideo/'. $documentaryVideo->id) }}" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Title</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="title" type="text" value="{{ $documentaryVideo->title }}" placeholder="Enter the title of the video" required="" aria-required="true" value="{{ old('title') }}">
                                            @error('title')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_alt" class="control-label col-lg-2">Video Link</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" value="{{ $documentaryVideo->video_link }}" name="video_link" type="text" placeholder="Enter the correct url of the video" required="" aria-required="true" value="{{ old('video_link') }}">
                                            @error('video_link')
                                            <label id="video_link" class="error" for="video_link">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="image" type="file" src="{{ $documentaryVideo->image }}">
                                            @error('image')
                                            <label id="image" class="error" for="image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-info waves-effect waves-light" type="submit">Update</button>
                                            <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- .form -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pls Remove -->
            <div style="height:600px;"></div>


        </div> <!-- container -->

    </div> <!-- content -->

@endsection