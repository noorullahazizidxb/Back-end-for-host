@extends('components.main')

@section('title', 'Slider')

@section('css-links')
<!-- Plugins css -->
<link href="assets/notifications/notification.css" rel="stylesheet" />
<!-- Plugin Css-->
<link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="assets/modal-effect/css/component.css" rel="stylesheet">


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
                    <h4 class="pull-left page-title">Slider Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="active">Edit Page</li>
                    </ol>
                </div>
                @if (Session::has('success'))
                <script>
                    $.Notification.autoHideNotify('success', 'top right', 'I will be closed in 5 seconds...'
                        , 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae orci ut dolor scelerisque aliquam.'
                    )

                </script>
                @endif
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Slider Text and Setting</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form">

                                @if ($sliderData)
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="sliderUpdate" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Slider
                                            Text</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="slider-text" name="slider_text" type="text" placeholder="Enter the Slider Text" required="" aria-required="true" value="{{ $sliderData->slider_text }}">
                                            @error('slider_text')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="interval" class="control-label col-lg-2">Slider Interval</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="interval" name="interval" type="number" placeholder="Enter the interval number, which should be in milisecond" required="" aria-required="true" value="{{ $sliderData->interval }}">
                                            @error('interval')
                                            <label id="slider-text-error" class="error" for="interval">
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
                                @else
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="slider" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group ">
                                        <label for="cnaslider-textme" class="control-label col-lg-2">Slider
                                            Text</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="slider-text" name="slider_text" type="text" placeholder="Enter the Slider Text" required="" aria-required="true" value="{{ old('slider_text') }}">
                                            @error('slider_text')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="interval" class="control-label col-lg-2">Slider Interval</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="interval" name="interval" type="number" placeholder="Enter the interval number, which should be in milisecond" required="" aria-required="true" value="{{ old('interval') }}">
                                            @error('interval')
                                            <label id="slider-text-error" class="error" for="interval">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                            <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div> <!-- .form -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Slider Images</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form" id="form">
                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" enctype="multipart/form-data" action="sliderImage" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group col-lg-6">
                                        <div class="col-lg-12">
                                            <input class=" form-control" id="slider-text" name="image_alt" type="text" placeholder="Image Alternative Text" required="" aria-required="true" value="{{ old('image_alt') }}">
                                            @error('image_alt')
                                            <label id="slider-text-error" class="error" for="slider-text">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <div class="col-lg-12">
                                            <input class="form-control" id="image" name="image" type="file" required="" aria-required="true" value="{{ old('image') }}">
                                            @error('image')
                                            <label id="slider-text-error" class="error" for="image">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                            <b>For better design, add an image with these dimensions: 3000x1300.</b>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-3">
                                            <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                            <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- .form -->
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-1">
                    <div class="panel panel-border panel-inverse">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Slider Text and Setting</h3>
                        </div>
                        <div class="panel-body">

                            <table class="table table-bordered table-striped" id="{{ count($slider) > 0 ? 'datatable' : '' }}">
                                <thead>
                                    <tr>
                                        <th>Image Alt Text</th>
                                        <th  class="no-sort">Image</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($slider) > 0)
                                    @foreach ($slider as $item)
                                    <tr class="datatable">
                                        <td id="image-alt-{{ $item->id }}">{{ $item->image_alt }}</td>
                                        <td class="actions">
                                            <img id="image-{{ $item->id }}" src="{{ $item->image }}" class="on-default" width="100%" height="50" />
                                        </td>
                                        <td class="actions">
                                            <button type="button" value="{{ $item->id }}" class="btn btn-info editBtn" data-id="{{ $item->id }}"><i class="fa fa-pencil"></i></button>

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
                                                        <a href="deleteSliderImage/{{ $item->id }}" type="button" class="btn btn-danger waves-effect waves-light">Confirm</a>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="gradeX">
                                        <td class="text-center" colspan="3">No Data!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content -->

    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Slider Images</h4>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="errors">

                    </div>

                    <input type="hidden" id="id" name="id" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_alt" class="control-label">Image Alt Text</label>
                                    <input type="text" class="form-control" name="image_alt" id="image_alt" placeholder="Image alt...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image" src="heelo.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default closeBtn waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info saveBtn waves-effect waves-light">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->
    @endsection

    @section('script-links')

    <script src="assets/notifications/notify.min.js"></script>
    <script src="assets/notifications/notify-metro.js"></script>
    <script src="assets/notifications/notifications.js"></script>
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#datatable').dataTable();
            $(document).on('click', '.editBtn', function() {
                var slider_id = $(this).val();

                // alert(slider_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "get"
                    , url: "updateSliderImage/" + slider_id
                    , success: function(response) {
                        console.log(response.id);

                        $('#image_alt').val(response.image_alt);
                        // $('#image').val(response.image);
                        $('#id').val(parseInt(slider_id));
                    }
                });
            });

            $(document).on('click', '.saveBtn', function() {
                var form = $(this).closest('form');
                var formData = new FormData(form[0]);
                formData.append('image_alt', $('input[name="image_alt"]', form).val());
                formData.append('id', $('input[name="id"]', form).val());
                formData.append('image', $('input[name="image"]', form)[0].files[0]);

                $.ajax({
                    type: 'POST'
                    , url: "updateSliderImage"
                    , data: formData
                    , processData: false
                    , contentType: false
                    , success: function(response) {
                        if (response.success) {
                            $(`#image-alt-${response.id}`).text(response.image_alt);
                            $('.errors').empty();
                            $(`#image-${response.id}`).attr('src', response.image_url);
                            $('#editModal').modal('hide');
                        } else {
                            alert('Something went wrong.');
                        }
                    }
                    , error: function(response) {
                        if (response.status === 422) { // Validation error
                            $('.errors').empty();
                            $.each(response.responseJSON.errors, function(index, value) {
                                $('.errors').append('<br /><div class="alert alert-danger">' + value + '</div>');
                            });
                            $('#editModal').modal('show');
                        } else {
                            alert('An unexpected error occurred. Please try again later.');
                        }
                    }
                });
            });

            $(document).on('click', '.closeBtn', function() {
                $('.errors').empty();
            });

        });

    </script>




    <!-- Modal-Effect -->
    <script src="assets/modal-effect/js/classie.js"></script>
    <script src="assets/modal-effect/js/modalEffects.js"></script>
    @endsection
