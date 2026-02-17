@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
@endpush

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8">
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
                <form method="post" id="" action="{{route('team_member_update')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$resource->id}}" name="resource_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$resource->name}}" name="name" id="name" class="form-control prod_form_field" >
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="{{$resource->title}}" name="title" id="title" class="form-control prod_form_field" >
                    </div>

                    <div class="form-group">
                        <label for="linkedin">Linked In</label>
                        <input type="text" value="{{$resource->linkedin}}" name="linkedin" id="linkedin" class="form-control prod_form_field" >
                    </div>

                    <img data-u="image" src="{{asset('images/team_images/'.$resource->image)}}" alt="{{$resource->name}}" width="200px"/>
                    <p class="mt-5">To replace the image click below to upload another one</p>
                    <input id="tm-image" type="file" class="form-control" name="tm-image">
                    <br>
                    <br>
                    <div class="form-group article_content_holder">
                        <button type="submit" class="btn btn-success btn-sm custom_button custom_button_width tiny_mce_submits" id="update_resource_details"> <i class="fa fa-edit"></i> Update </button>
                        <button type="button" class="btn btn-danger btn-sm custom_button custom_button_width tiny_mce_submits delete_team_member_icon" data-toggle="modal" data-uid="{{$resource->id}}" data-name="{{$resource->name}}" data-logo="{{$resource->logo}}" data-target="#delete_team_member"> <i class="fa fa-times-circle"></i> Delete </button>

                        <div>
                            <p class="ajax_success_p text-success"></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        @include('backend.modals.delete-team_member')
    </section>

    <div class="clearfix"></div>

@endsection

@push('scripts')
    <script src="{{asset('js/backend/dropzone/dropzone.js')}}"></script>
    <script>
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
                    url: '{!! route("team_member_delete") !!}',
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
                        $('#delete_team_member').modal('hide');

                        window.location = "{!! route('admin_team_members') !!}";


                    })//end done

                    .fail(function (xhr) {

                    }); //end fail
            }); //end delete team_member
        }); //End doc ready
    </script>
@endpush
