@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
    <style>
        /*
         .custom-file-upload {
             border: 1px solid #ccc;
             display: inline-block;
             padding: 6px 12px;
             cursor: pointer;
         } */
        input[type="file"] {
            cursor: pointer;

        }

        .switch {
            position: relative;
            display: inline-block;
            width: 70px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')

    <section class="content">
        <div>
            <div class="row">
                <div class="col-md-10">
                    @if (Session::has('success'))
                        <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('failure'))
                        <div class="alert alert-micro alert-border-left alert-danger pastel alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i>
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <form method="post" id="article_details_form" action="{{route('update_accreditation')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="resource_id">
                        <div class="form-group article_content_holder">
                            <label for="title">Title of the accreditation</label>
                            <input type="text" class="form-control mb-4" name="title" id="title" value="{{$resource->title}}" required>
                            
                            <label for="show_title">Show Title</label>
                            <select class="form-control" id="show_title" name="show_title">
                                <option value="0" @if($resource->show_title == 0) selected @endif>No</option>
                                <option value="1" @if($resource->show_title == 1) selected @endif>Yes</option>
                            </select>

                            <div class="col-md-12 mt-4 mb-4">
                                <label class="text-left text-capitalize"> Featured Image</label>
                                <br>
                                <img src="{{asset('images/accreditation_images/'.$resource->image_url)}}" alt="Image" class="img-fluid">

                                <br>
                                <p class="mt-5">To replace the image click below to upload another one</p>
                                <input id="accreditation_image" type="file" class="form-control" name="accreditation_image">
                                <br>
                            </div>


                           {{-- <button type="submit" class="ml-1 btn btn-success btn-sm btn-flat custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> &nbsp;  &nbsp;  &nbsp; Save Accreditation  &nbsp;  &nbsp;  &nbsp;  </button>
                            <i class="fa fa-spinner ajax_spinner"></i>
                            <div>
                                <p class="ajax_success_p text-success"></p>
                            </div>--}}
                            <div class="form-group article_content_holder">
                                <button type="submit" class="btn btn-success btn-sm custom_button custom_button_width tiny_mce_submits" id="update_resource_details"> <i class="fa fa-edit"></i> Update </button>
                                <button type="button" class="btn btn-danger btn-sm custom_button custom_button_width tiny_mce_submits delete_team_member_icon" data-toggle="modal" data-uid="{{$resource->id}}" data-name="{{$resource->name}}" data-logo="{{$resource->logo}}" data-target="#delete_accreditation"> <i class="fa fa-times-circle"></i> Delete </button>

                                <div>
                                    <p class="ajax_success_p text-success"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('backend.modals.delete-accreditation')

    </section>

    <div class="clearfix"></div>

@endsection

@push('scripts')

    <script>
        // Turn off autodiscover for dropzone
        // Dropzone.autoDiscover = false;
        $(document).ready(function () {
            /**
             * Handle delete of image
             */
            $(document).on("click", ".delete_team_member_icon", function () {
                $('.ajax_status span').empty().removeClass('text-danger','text-success');

                var resource_uid = $(this).data('uid');


                $(".modal-body #resource_uid").val( resource_uid );


            });

            $(document).on("click", "#delete_team_member_yes", function(e) {
                $('.ajax_status i').css({'display':'inline'});
                // $('.ajax_status span').empty();
                // console.log("Send Ajax request to delete the category: ", $('#cat_uid').val());
                resource_uid  = $('#resource_uid').val();


                $.ajax({
                    url: '{!! route("delete_accreditation") !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': " {{csrf_token()}}"
                    },
                    data: {
                        resource_uid:resource_uid
                    }
                })
                    .done(function (response) {

                        response = JSON.parse(response);
                        $('.ajax_status i').css({'display':'none'});

                        // $('.modal_cancel').text('Close');
                        if(response.status == 1){
                            $('.ajax_status span').text(response.message).addClass('text-success');
                        }else {
                            $('.ajax_status span').text(response.message).addClass('text-danger');
                        }

                        // Close modal
                        $('#delete_accreditation').modal('hide');

                        window.location = "{!! route('accreditation_items') !!}";


                    })//end done

                    .fail(function (xhr) {

                    }); //end fail
            }); //end delete team_member
        }); //End doc ready
    </script>
@endpush
