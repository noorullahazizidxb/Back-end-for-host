@extends('components.main')

@section('css-links')

<link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('title', 'Rupani Foundation - Where We Work')

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
                    <h4 class="pull-left page-title">Where We Work</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active">Where We Work</li>
                    </ol>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading well well-lg">
                            <h3 class="panel-title pull-left">Where We Work Table</h3>
                            @if($whereWeWork != null)
                            <a href="{{url('addWhereWeWork/')}}" class="btn btn-info pull-right"><i class="fa fa-pencil"></i></a>
                            @else
                            <a href="{{url('addWhereWeWork')}}" class="btn btn-info pull-right">Add a place</a>
                            @endif
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered">
                                @if ($whereWeWork != null)

                                <thead>
                                    <tr>
                                        <th>Image Alt</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $whereWeWork->image_alt }}</td>                                        
                                        <td class="text-center">
                                            <img src="{{ $whereWeWork->image }}" width="50%" height="100"  />
                                        </td>                                       
                                    </tr>
                                </tbody>

                                    <tr>
                                        <th class="text-center" colspan="2">Content</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td colspan="2"><div width='40'>{!! $whereWeWork->content !!}</div></td>                                        
                                    </tr>
                                </tbody>
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="6">No Data!</td>
                                    </tr>
                                    @endif
                            </table>
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

<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {        
        $('#datatable').dataTable();
    });
</script>

@endsection
