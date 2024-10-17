@extends('components.main')

@if(!$whereWeWork)
@section('title', 'Add Location')
@else
@section('title', 'Edit Location')
@endif

@section('css-links')

<!--bootstrap-wysihtml5-->
<link href="assets/summernote/summernote.css" rel="stylesheet" />

@endsection

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
                    <h4 class="pull-left page-title">Where We work</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{url('whereWeWork')}}">Where We Work</a></li>
                        @if(!$whereWeWork)
                        <li class="active">Add a Location</li>
                        @else 
                        <li class="active">Edit a Location</li>
                        @endif
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            @if(!$whereWeWork)
                            <h3 class="panel-title text-center">Add a Location</h3>
                            @else
                            <h3 class="panel-title text-center">Edit the Location</h3>
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                @if(!$whereWeWork)
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                    action="addWhereWeWork" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <div class="col-lg-6">
                                            <label for="image_alt" class="control-label">Image Alt</label>
                                            <input class=" form-control" name="image_alt" type="text"
                                                placeholder="Enter the image's alternative text less than 125 Characters"
                                                required="" aria-required="true"
                                                value="{{ old('image_alt') }}">
                                            @error('image_alt')
                                            <label id="image_alt" class="error" for="image_alt">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="image" class="control-label">Image</label>
                                            <input class="form-control" name="image" type="file">
                                            @error('image')
                                            <label id="image" class="error" for="image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="content" class="control-label">Content</label>
                                            {{-- <textarea id="summernote">{{ old('content') }}</textarea> --}}
                                            <textarea name="content"
                                                class="summernote">{{ old('content') }}</textarea>
                                            {{-- <input type="hidden" name="content" id="summernote-content" value="">
                                            --}}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-11 col-lg-offset-1">
                                            @if(!$whereWeWork)
                                            <button class="btn btn-success waves-effect waves-light"
                                                type="submit">Add</button>
                                                @else
                                                <button class="btn btn-info waves-effect waves-light"
                                                type="submit">Update</button>
                                                @endif
                                            <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                action="addWhereWeWork" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">

                                    <div class="col-lg-6">
                                        <label for="image_alt" class="control-label">Image Alt</label>
                                        <input class=" form-control" name="image_alt" type="text"
                                            placeholder="Enter the image's alternative text less than 125 Characters"
                                            required="" aria-required="true"
                                            value="{{ (old('image_alt') != $whereWeWork->image_alt && old('image_alt') === null) ? $whereWeWork->image_alt : old('image_alt') }}">
                                        @error('image_alt')
                                        <label id="image_alt" class="error" for="image_alt">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="image" class="control-label">Image</label>
                                        <input class="form-control" name="image" type="file">
                                        @error('image')
                                        <label id="image" class="error" for="image">
                                            {{ $message }}
                                        </label>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="content" class="control-label">Content</label>
                                        {{-- <textarea id="summernote">{{ old('content') }}</textarea> --}}
                                        <textarea name="content"
                                            class="summernote">{{ (old('content') != $whereWeWork->content && old('content') === null) ? $whereWeWork->content : old('content') }}</textarea>
                                        {{-- <input type="hidden" name="content" id="summernote-content" value="">
                                        --}}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-lg-11 col-lg-offset-1">
                                        @if(!$whereWeWork)
                                        <button class="btn btn-success waves-effect waves-light"
                                            type="submit">Add</button>
                                            @else
                                            <button class="btn btn-info waves-effect waves-light"
                                            type="submit">Update</button>
                                            @endif
                                        <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                                @endif
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

    @section('script-links')
    <!--form validation init-->
    <script src="assets/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 30,   // set editor height
                minHeight: null,   // set minimum height of editor
                maxHeight: null,   // set maximum height of editor
                focus: true     // set focus to editable area after initializing summernote
            });
        });
        jQuery(document).ready(function(){

               $('.summernote').summernote({
                   height: 250,                 // set editor height

                   minHeight: null,             // set minimum height of editor
                   maxHeight: null,             // set maximum height of editor

                   focus: true                 // set focus to editable area after initializing summernote
               });

           });

//            $('.summernote').onChange(function() {
//            $('#summernote-content').val($('.summernote').summernote('code'));
// });
    </script>
    @endsection