@extends('components.main')

@section('title', 'Edit Location')

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
                        <li><a href="whereWeWork">Where We Work</a></li>
                        <li class="active">Edit a Location</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Edit a Location</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                    action="editWhereWeWork" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <div class="col-lg-6">
                                            <label for="image_alt" class="control-label">Image Alt</label>
                                            <input class=" form-control" name="image_alt" type="text"
                                                placeholder="Enter the image's alternative text less than 125 Characters"
                                                required="" aria-required="true" value="{{ (old('image_alt') != $whereWeWork->image_alt && old('image_alt') === null) ? $whereWeWork->image_alt : old('image_alt') }}">
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
                                            <textarea name="content" class="sample"></textarea>
                                            <div class="summernote">Hello Summernote</div>
                                            {{-- <input type="hidden" name="content" id="summernote-content"
                                                value=""> --}}
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-11 col-lg-offset-1">
                                                <button class="btn btn-success waves-effect waves-light"
                                                    type="submit">Add</button>
                                                <button class="btn btn-default waves-effect"
                                                    type="button">Cancel</button>
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

    @section('script-links')
    <!--form validation init-->
    <script src="assets/summernote/summernote.min.js"></script>

    <script>
        jQuery(document).ready(function(){

               $('.sample').summernote({
                   height: 200,                 // set editor height

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