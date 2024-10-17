@extends('components.main')

@section('title', 'Add What We Do Category')

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
                    <h4 class="pull-left page-title">Category</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('whatWeDoCategories') }}">What We Do Categories</a></li>
                        <li class="active">Add a Category</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Add a Category</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{ url('addWhatWeDoCategory')}} " novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Name</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="name" type="text" placeholder="Enter the name of the category" required="" aria-required="true" value="{{ old('name') }}">
                                            @error('name')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_alt" class="control-label col-lg-2">Image Alt</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="image_alt" type="text" placeholder="Enter the image's alternative text less than 125 Characters" required="" aria-required="true" value="{{ old('image_alt') }}">
                                            @error('image_alt')
                                            <label id="image_alt" class="error" for="image_alt">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="image" type="file">
                                            @error('image')
                                            <label id="image" class="error" for="image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                            <b>For better design, add an image with these dimensions: 390x250.</b>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Add</button>
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