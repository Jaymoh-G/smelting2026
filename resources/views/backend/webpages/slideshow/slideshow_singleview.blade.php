@extends('layouts.backend')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
@endpush

@section('content')
<div class="row actions_row">
    <div class="col-md-11 ml-1">
        <!-- <a class="btn btn-sm btn-flat bg-orange" href="{{route('admin_slideshow')}}">
            <i class="fa fa-backward"></i> Slideshow Images
        </a> -->
    </div>
</div>
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
            <form method="post" id="" action="{{route('slideshowimage_update')}}">
                @csrf
                <input type="hidden" value="{{$resource->id}}" name="resource_id">
                <div class="form-group">
                    <label for="article_title">Image Title</label>
                    <input type="text" value="{{$resource->title}}" name="title" id="title" class="form-control prod_form_field" >
                </div>

                <div class="form-group">
                    <label for="article_title">Image Description</label>
                    <input type="text" value="{{$resource->description}}" name="description" id="description" class="form-control prod_form_field" >

                </div>

                <!-- <img src="////images/{{asset($assets_folder)}}/{{$resource->image_url}}" width="100%"> -->
                <img class="img-responsive" src="/images/slideshow_images/{{$resource->image_url}} " width="100%">


                <div class="form-group article_content_holder mt-3">
                    <button type="submit" class="btn btn-success btn-sm custom_button custom_button_width tiny_mce_submits" id="update_resource_details"> <i class="fa fa-edit"></i> Update </button>
                    <button type="button" class="btn btn-danger btn-sm custom_button custom_button_width tiny_mce_submits delete_image_icon" data-toggle="modal" data-uid="{{$resource->id}}" data-imageurl="{{$resource->image_url}}" data-target="#delete_slide_image"> <i class="fa fa-times-circle"></i> Delete </button>

                    <div>
                        <p class="ajax_success_p text-success"></p>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @include('backend.webpages.modals.delete-slide-image')
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
        $(document).on("click", ".delete_image_icon", function () {
            $('.ajax_status span').empty().removeClass('text-danger','text-success');

            var image_uid = $(this).data('uid');
            var image_name = $(this).data('imageurl');

            $(".modal-body #image_uid").val( image_uid );
            $(".modal-body #image_name").val( image_name );

        });

        $(document).on("click", "#delete_image_yes", function(e) {
            $('.ajax_status i').css({'display':'inline'});
            // $('.ajax_status span').empty();
            // console.log("Send Ajax request to delete the category: ", $('#cat_uid').val());
            image_uid  = $('#image_uid').val();
            image_name = $('#image_name').val();
            $.ajax({
                url: '{!! route("slideshowimage_delete") !!}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': " {{csrf_token()}}"
                },
                data: {
                    image_uid:image_uid, image_name:image_name
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
                    $('#delete_slide_image').modal('hide');

                    window.location = "{!! route('admin_slideshow') !!}";


                })//end done

                .fail(function (xhr) {

                }); //end fail
        }); //end delete image
    }); //End doc ready
</script>
@endpush
