@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
@endpush

@section('content')
    <div class="row actions_row">
        <!-- <div class="col-md-12">
            <a class="btn btn-sm btn-flat bg-orange" href="{{url('/admin')}}">
                <i class="fa fa-backward"></i> Dashboard
            </a>
        </div> -->
    </div>
    <section class="content">
        @if(count($images) > 0)
            <div class="row" style="margin-top: 1em; border-top: 1px solid #C6C6C6;" id="update_product_images_row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="text-center" style="margin-bottom: 1.5em; margin-top: 1.5em;">
                        <h4 class="text-center text-uppercase doublebordersheader smallerh4"> Slideshow Images</h4>
                    </div>

                    <div class="row" style=";">
                        @foreach($images as $index => $image)
                            <div class="col-md-4 image_container" style="border: 1px solid re">

                                <div class="image_ops_icons_holder">
                                    <i style="cursor: pointer" class="fa fa-times-circle-o fa-2x text-danger delete_image_icon" id="{{$image->id}}" data-toggle="modal" data-uid="{{$image->id}}" data-imageurl="{{$image->image_url}}" data-target="#delete_slide_image" title="Delete Image"></i>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <a href="{{route('slideshowimage_edit', ['id' => $image->id])}}">
                                        <span style="position: relative; top: -5px">Edit</span>
                                        <i class="fa fa-eye fa-2x text-success "></i>
                                    </a>
                                </div>
                                <!-- <img class="img-responsive" src="{{env('APP_URL')}}images/{{asset($assets_folder)}}/{{$image->image_url}} "> -->
                                <img class="img-responsive" src="/images/slideshow_images/{{$image->image_url}} " height="100px">

                            </div>
                            @if(($index+1) % 3 == 0)
                    </div>
                    <div class="row" style="border-top: 1px dotted #C1C1C1; margin-top: 1em; padding-top: 1em;">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <br/>
        @else
            <h4 class="text-center text-uppercase smallerh4"> The slideshow has no images yet </h4>
        @endif
        <div class="row " id="" style="border-top: 1px solid #C6C6C6">
            <div class="col-md-8 offset-2">
                <h4 class="text-center text-uppercase smallerh4"> Add Images</h4>
                <!-- <p class="text-center">Click Below To Upload</p> -->
                <div class="row">
                    <div class="col-md-12 text-center">

                        <div class="wrapper" style="margin-top: 15px; margin-bottom: 15px; max-hesight: 27em; overflow-y: hidden;">
                            <div id="dropzone">
                                <form class="dropzone" id="my-dropzone" method="POST" action="{{ route('slideshowimage_upload') }}">
                                    {{ csrf_field() }}
                                    <!-- Single file upload  -->
                                    <div class="dz-default dz-message"><span>Drop a file here to upload</span></div>

                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
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
