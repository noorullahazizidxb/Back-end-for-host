@extends('components.main')

@section('title', 'Add Reports and Data')

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
                    <h4 class="pull-left page-title">Reports and Data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('reports') }}">Reports and Datas</a></li>
                        <li class="active">Add a Reports and Data</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Add a Reports and Data</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                    action="{{url('addReport')}}" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <div class="col-lg-5 col-lg-offset-1">
                                            <label for="title" class="control-label">Title</label>

                                            <input class=" form-control" name="title" type="text"
                                                placeholder="Enter the Title of the report" required=""
                                                aria-required="true" value="{{ old('title') }}">
                                            @error('title')
                                            <label id="title" class="error" for="title">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-5">
                                            <label for="image_alt" class="control-label">Image Alt</label>

                                            <input class=" form-control" name="image_alt" type="text"
                                                placeholder="Enter the alternative text for the Image" required=""
                                                aria-required="true" value="{{ old('image_alt') }}">
                                            @error('image_alt')
                                            <label id="image_alt" class="error" for="image_alt">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-5 col-lg-offset-1">
                                            <label for="image" class="control-label">Image</label>
                                            <input class="form-control" name="image" type="file">
                                            @error('image')
                                            <label id="image" class="error" for="image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-5">
                                            <label for="file" class="control-label">PDF File</label>
                                            <input class="form-control" name="file" type="file" accept="application/pdf">
                                            @error('file')
                                            <label id="file" class="error" for="file">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-3">
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