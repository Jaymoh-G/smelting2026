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
                    <form method="post" id="article_details_form" action="{{route('update_blog')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="resource_id">
                        <div class="form-group article_content_holder">
                            <label for="title">Title of the blog</label>
                            <input type="text" class="form-control mb-4" name="title" id="title" value="{{$resource->title}}" required>

                            <label for="teaser">Teaser Content</label>
                            <textarea id="teaser" name="teaser" class="form-control mb-4">{{$resource->teaser}}</textarea>

                            <label for="title" class="mt-4">Full Content Content</label>
                            <textarea id="content" name="content" class="form-control mb-4">{{$resource->content}}</textarea>

                            <div class="mt-3">
                                <span>Draft</span>
                                <label class="switch">
                                    <input type="radio" name="is_draft_or_publish" value="is_draft" @if($resource->is_draft == 1) checked @endif>
                                    <span class="slider"></span>
                                </label>
                                &nbsp; &nbsp; &nbsp;
                                <span>Published</span>
                                <label class="switch">
                                    <input type="radio" name="is_draft_or_publish" value="is_published" @if($resource->is_published == 1) checked @endif>
                                    <span class="slider"></span>
                                </label>

                            </div>

                            <div class="col-md-12 mt-4 mb-4">
                                <label class="text-left text-capitalize"> Featured Image</label>
                                <br>
                                <img src="{{asset('images/blog_images/'.$resource->image_url)}}" alt="Image" class="img-fluid">
                                {{-- <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="wrapper" style="margin-top: 15px; margin-bottom: 15px; max-hesight: 27em; overflow-y: hidden;">
                                            <div id="dropzone" class="dropzone">
                                                <div class="dz-default dz-message"><span>Drop a file here to upload</span></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> --}}
                                {{-- <label for="file-upload" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i> Click Here to Select Image From Your Computer
                                </label>
                                <input id="file-upload" type="file"/> --}}
                                <br>
                                <p class="mt-5">To replace the image click below to upload another one</p>
                                <input id="blog_image" type="file" class="form-control" name="blog_image">
                                <br>
                            </div>

                            {{-- <textarea id="teaser" name="article_content" >{{$resource->article_content}}</textarea> --}}
                            <button type="submit" class="ml-1 btn btn-success btn-sm btn-flat custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> &nbsp;  &nbsp;  &nbsp; Save Blog  &nbsp;  &nbsp;  &nbsp;  </button>
                            <i class="fa fa-spinner ajax_spinner"></i>
                            <div>
                                <p class="ajax_success_p text-success"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

@endsection

@push('scripts')
    <script src="{{asset('js/backend/dropzone/dropzone.js')}}"></script>
    <script src="{{ URL::asset('js/backend/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
         // Turn off autodiscover for dropzone
         // Dropzone.autoDiscover = false;
        $(document).ready(function () {
            tinymce.init({
                // selector: '#teaser'
                mode : "textareas",
                // forced_root_block : ""
            });



            /* var myDropzone = new Dropzone(".dropzone", {
                autoProcessQueue: false,
                maxFilesize: 2,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                url: "{!! route("store_blog") !!}"

            }); */
        }); //End doc ready
    </script>
@endpush
