@extends('components.main')

@section('css-links')

<link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('title', 'Rupani Foundation - Reports and Data')

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
                        <li class="active">Reports and Data</li>
                    </ol>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading well well-lg">
                            <h3 class="panel-title pull-left">Reports and Data Table</h3>
                            <a href="{{ url('addReport') }}" class="btn btn-info pull-right">Add a Reports and Data Release Record</a>
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped" id="{{ count($reports) > 0 ? 'datatable' : '' }}">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image Alt</th>
                                        <th class="no-sort">Image</th>
                                        <th class="no-sort">File</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($reports) > 0)
                                    @foreach ($reports as $item)
                                    <tr class="datatable">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->image_alt }}</td>
                                        
                                        <td>
                                            <img src="{{ $item->image }}" width="100%" height="50" />
                                        </td>

                                        <td>
                                            <a href="{{ url('readReport/' . $item->id) }}" target="_blank" class="btn btn-info waves-effect btn-sm">Read</a>
                                            <a href="{{ url('downloadReport/' . $item->id) }}" class="btn btn-success waves-effect btn-sm">Download</a>
                                        </td>

                                        <td class="actions">
                                            <a href="{{('updateReport/'.$item->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                            <a href="#" class="btn btn-danger remove-row" data-id="{{ $item->id }}" data-toggle="modal" data-target="#custom-width-modal-{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <div id="custom-width-modal-{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="custom-width-modalLabel">
                                                            Are you
                                                            sure?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure that you want to delete this row?</p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a href="deleteReport/{{ $item->id }}" type="button" class="btn btn-danger waves-effect waves-light">Confirm</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="8">No Data!</td>
                                    </tr>
                                    @endif
                                </tbody>
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
