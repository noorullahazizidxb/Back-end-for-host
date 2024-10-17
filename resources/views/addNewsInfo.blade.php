@extends('components.main')

@section('title', 'Add News Info')

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
                    <h4 class="pull-left page-title">News Info</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('newsInfo') }}">News Infos</a></li>
                        <li class="active">Add a News Info</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Add a News Info</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST"
                                    action="{{url('addNewsInfo')}}" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-lg-5 col-md-offset-1">
                                            <label for="month">Select the Starting Month:</label>
                                            <select class="form-control" id="start_month" name="start_month">
                                                <option value="">Select the Starting Month</option>
                                                @foreach ($months as $monthName)
                                                    <option value="{{ $monthName }}">{{ $monthName }}</option>
                                                @endforeach
                                            </select>
                                            @error('start_month')
                                            <label id="start_month" class="error" for="start_month">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>

                                        <div class="col-lg-5">
                                            <label for="month">Select the Ending Month:</label>
                                            <select class="form-control" id="end_month" name="end_month">
                                                <option value="">Select the Ending Month</option>
                                                @foreach ($months as $monthName)
                                                    <option value="{{ $monthName }}">{{ $monthName }}</option>
                                                @endforeach
                                            </select>
                                            @error('end_month')
                                            <label id="end_month" class="error" for="end_month">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-5 col-md-offset-1">
                                            <label for="year">Select a Year:</label>
                                            <select class="form-control" id="year" name="year">
                                                <option value="">Select a Year</option>
                                                @for ($year = $currentYear; $year >= 2000; $year--)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                            @error('year')
                                            <label id="year" class="error" for="year">
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