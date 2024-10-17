@extends('components.main')

@section('title', 'Add Career')

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
                    <h4 class="pull-left page-title">Career</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('careers') }}">Careers</a></li>
                        <li class="active">Add a Career</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Add a Career</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{url('addCareer')}}" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="title" class="control-label col-lg-2">Title</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="title" type="text" placeholder="Enter the title of the Career" required="" aria-required="true" value="{{ old('title') }}">
                                            @error('title')
                                            <label id="title" class="error" for="title">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date" class="control-label col-lg-2">Closing Date</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="date" type="date" placeholder="Enter the date of the press release" required="" aria-required="true" value="{{ old('date') }}">
                                            @error('date')
                                            <label id="date" class="error" for="date">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="link" class="control-label col-lg-2">Job Link</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="link" type="url" placeholder="Enter the URL of how to apply for the job" required="" aria-required="true" value="{{ old('link') }}">
                                            @error('link')
                                            <label id="link" class="error" for="link">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_alt" class="control-label col-lg-2">Image Alt</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="image_alt" type="text" placeholder="Enter the alternative text for the Image" required="" aria-required="true" value="{{ old('image_alt') }}">
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