@extends('components.main')

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
                    <h4 class="page-title text-center">Admin Panel</h4>
                </div>
            </div>

            <!-- Pls Remove -->
            <div class="col-sm-6 col-xs-12">
                <div class="pull-left">
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="{{url('slider')}}">Slider</a></li>
                        <li> <a href="#">What We Do</a>
                            <ul>
                                <li><a href="{{url('whatWeDoCategories')}}">Categories</a></li>
                                <li><a href="{{url('whatWeDoContent')}}">Content</a></li>
                            </ul>
                        </li>
                        <li> <a href="#">Pages</a>
                            <ul>
                                <li><a href="{{url('directors')}}">Board of Directors</a></li>
                                <li><a href="{{url('team')}}">Management Team</a></li>
                                <li><a href="{{url('photoGallery')}}">Photo Gallery</a></li>
                                <li><a href="{{url('documentaryVideos')}}">Documentary Videos</a></li>
                                <li><a href="{{url('pressRelease')}}">Press Release</a></li>
                                <li><a href="{{url('newsInfo')}}">News Info</a></li>
                                <li><a href="{{url('reports')}}">Reports and Data</a></li>
                                <li><a href="{{url('careers')}}">Careers</a></li>
                                <li><a href="{{url('partners')}}">Partners</a></li>
                                <li><a href="{{url('whereWeWork')}}">Where We Work</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('comments')}}">Comments</a></li>
                        <li><a href="{{url('profile')}}">Settings</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <h4>Tools</h4> <b>For compressing images, use this tool:</b> <br /> <a
                    href="https://compressor.io/" target="_blank">Compressor.io</a> <br /> <br />
                <b>For resizing images, use this tool:</b>
                <br />
                <a href="https://biteable.com/tools/image-resizer/" target="_blank">Biteable Image Resizer</a>
            </div>



        </div> <!-- container -->

    </div> <!-- content -->

    @endsection