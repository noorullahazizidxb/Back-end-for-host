@extends('components.main')

@section('title', 'Rupdani Foundation - Edit Team Member')

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
                    <h4 class="pull-left page-title">Management Team</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="directors">Management Team</a></li>
                        <li class="active">Edit a Team Member</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Edit the Team Member</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="{{ url('updateTeamMember/'. $teamMember->id) }}" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Name</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" name="name" type="text" value="{{ $teamMember->name }}" placeholder="Enter the Name of the Director" required="" aria-required="true" value="{{ old('name') }}">
                                            @error('name')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Position</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" value="{{ $teamMember->position }}" name="position" type="text" placeholder="Enter the Position of the Director" required="" aria-required="true" value="{{ old('position') }}">
                                            @error('position')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_alt" class="control-label col-lg-2">Image Alt</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" value="{{ $teamMember->image_alt }}" name="image_alt" type="text" placeholder="Enter the image's alternative text less than 125 Characters" required="" aria-required="true" value="{{ old('image_alt') }}">
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
                                            <input class="form-control" name="image" type="file" src="{{ $teamMember->image }}">
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