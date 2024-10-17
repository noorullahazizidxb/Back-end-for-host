<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('images/favicon_1.ico')}}">

        <title>@yield('title', 'Rupani Foundation Admin Panel')</title>

        <!-- Base Css Files -->
        <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href=" {{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href=" {{ asset('assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href=" {{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href=" {{ asset('css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href=" {{ asset('css/waves-effect.css') }}" rel="stylesheet">

        <!-- Custom Files -->
        <link href=" {{ asset('css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @yield('css-links')
        <script src="{{asset('js/modernizr.min.js')}}"></script>
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="admin" class="logo"><i class="md"><img src="{{asset('images/rupani-logo-n.63b9ead7.png')}}" alt=""  width="50%"/></i></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                {{-- <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                {{-- <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li> --}}
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                        <div class="thumb-md img-circle text-uppercase" style="border: 1px solid white; color: white; display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: bold; margin-top:1rem">
                                            {{ substr(auth()->user()->name, 0, 1) }}
                                        </div> 
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="logout"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <div class="thumb-md img-circle text-uppercase" style="border: 1px solid black; color: black; display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: bold; margin-top:1rem">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div> 
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="logout"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="/" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{url('slider')}}" class="waves-effect"><i class="md  md-collections"></i><span> Slider </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-folder"></i><span> What We Do </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">        
                                    <li>
                                        <a href="{{url('whatWeDoCategories')}}">Categories </a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('whatWeDoContent')}}">Content</a>
                                    </li>
                                </ul>
                            </li> 

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-folder"></i><span> Pages </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">        
                                    <li>
                                        <a href="{{url('directors')}}"> Board of Directors </a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('team')}}">Management Team</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('photoGallery')}}">Photo Gallery</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('documentaryVideos')}}">Documentary Videos</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('pressRelease')}}">Press Release</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('newsInfo')}}">News Info</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('reports')}}">Reports and Data</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('careers')}}">Careers</a>
                                    </li>
        
                                    <li>
                                        <a href="{{url('partners')}}">Partners</a>
                                    </li>

                                    <li>
                                        <a href="{{url('whereWeWork')}}">Where We Work</a>
                                    </li>
                                </ul>
                            </li> 
                            
                            <li>
                                <a href="{{url('comments')}}" class="waves-effect"><i class="md   md-message"></i><span> Comments </span></a>
                            </li>
                            
                            {{-- <li>
                                <a href="{{url('profile')}}" class="waves-effect"><i class="md   md-settings"></i><span> Settings </span></a>
                            </li> --}}

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

