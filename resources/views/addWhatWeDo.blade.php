@extends('components.main')

@section('title', 'Add What We Do Content')

@section('css-links')

<!--bootstrap-wysihtml5-->
<link href="{{url('assets/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{url('assets/select2/select2.css')}}" rel="stylesheet" type="text/css" />

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
                    <h4 class="pull-left page-title">What We Do</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('whatWeDoContent') }}">What We Do Content</a></li>
                        <li class="active">Add a Record</li>
                    </ol>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Add a Content</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                    action="{{ url('addWhatWeDo')}} " novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <label for="title" class="control-label">Title</label>
                                            <input class=" form-control" name="title" type="text"
                                                placeholder="Enter the title of the What We Do Content" required=""
                                                aria-required="true" value="{{ old('title') }}">
                                            @error('title')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-offset-1">
                                        <div class="col-lg-5 col-lg-offset-1">
                                            <label class="control-label">Category</label>
                                            <select class="select2" name="category_id"
                                                data-placeholder="Choose a Category...">
                                                <option value="#">&nbsp;</option>
                                                @foreach($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <label id="category_id" class="error" for="category_id">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-5">
                                            <label for="image_alt" class="control-label">Starter Image</label>
                                            <input class="form-control" name="starter_image" type="file">
                                            @error('starter_image')
                                            <label id="starter_image" class="error" for="starter_image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                            <b>For better design, add an image with these dimensions: 1440x540.</b>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <label for="starter_text" class="control-label">Starter Text</label>
                                            <textarea class=" form-control" name="starter_text" type="text"
                                                placeholder="Enter the starter text of the content" required=""
                                                aria-required="true" rows="5">{{ old('starter_text') }}</textarea>
                                            @error('starter_text')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <label for="content" class="control-label">Content</label>
                                            {{-- <textarea id="summernote">{{ old('content') }}</textarea> --}}
                                            <textarea name="content" class="summernote">{{old('content')}}</textarea>
                                            {{-- <input type="hidden" name="content" id="summernote-content" value="">
                                            --}}
                                            @error('content')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light"
                                                type="submit">Add</button>
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

    @section('script-links')
    <!--form validation init-->
    <script src="{{url('assets/summernote/summernote.min.js')}}"></script>
    <script src="{{url('assets/select2/select2.min.js')}}" type="text/javascript"></script>

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

           jQuery(".select2").select2({
                    width: '100%', 
                    height: '20px'
                });

//            $('.summernote').onChange(function() {
//            $('#summernote-content').val($('.summernote').summernote('code'));
// });
    </script>
    @endsection