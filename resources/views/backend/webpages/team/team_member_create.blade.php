@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
    <style>
        .dropzone, .dropzone * {
            box-sizing: border-box; }

        .dropzone {
            position: relative; }
        .dropzone .dz-preview {
            position: relative;
            display: inline-block;
            width: 120px;
            margin: 0.5em; }
        .dropzone .dz-preview .dz-progress {
            display: block;
            height: 15px;
            border: 1px solid #aaa; }
        .dropzone .dz-preview .dz-progress .dz-upload {
            display: block;
            height: 100%;
            width: 0;
            background: green; }
        .dropzone .dz-preview .dz-error-message {
            color: red;
            display: none; }
        .dropzone .dz-preview.dz-error .dz-error-message, .dropzone .dz-preview.dz-error .dz-error-mark {
            display: block; }
        .dropzone .dz-preview.dz-success .dz-success-mark {
            display: block; }
        .dropzone .dz-preview .dz-error-mark, .dropzone .dz-preview .dz-success-mark {
            position: absolute;
            display: none;
            left: 30px;
            top: 30px;
            width: 54px;
            height: 58px;
            left: 50%;
            margin-left: -27px;
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
                        <form method="post" id="" class="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control prod_form_field" >
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control prod_form_field" >
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linked In</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control prod_form_field" >
                            </div>
                            <label for="name">Picture</label>
                            <div class="form-group">
                                <div class="dropzoneholder">
                                    <div class="dropzone hzScroll" id="my-drop-zone">
                                        <div class="dz-message">
                                            <i class="fa fa-cloud-upload fa-2x text-success"></i>
                                            &nbsp; &nbsp;
                                            <span>Drop your files or click here to upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success mb-5" id="upload_data"> Create </button>
                        </form>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

@endsection

@push('scripts')
    <script src="{{asset('js/backend/dropzone/dropzone.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {

            /*var myDropzone = new Dropzone("div#mydropzone", {
                autoProcessQueue: false,
                maxFilesize: 1,

                acceptedFiles: ".jpeg,.jpg,.png,.gif"
            });

            $('#upload_data').click(function(e){
                e.preventDefault();
                myDropzone.processQueue();
            });
*/

            /*// Dropzone class:
            var myDropzone = new Dropzone("div#mydropzone", { url: "/file/post"});*/

            /**
             Drop zone operations
             **/
            var myDropzone = new Dropzone("div#my-drop-zone", {
                url: "{!! route('team_member_post') !!}",
                autoProcessQueue: false,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': " {{csrf_token()}}"
                },
                init: function (e) {

                    var myDropzone = this;

                    $('#upload_data').on("click", function(e) {
                        e.preventDefault();
                        if($('#name').val() === "" || $('#title').val() === ""){
                            $("div.ajax_error_holder").css({"display":"block"});
                            $(".ajax_error_p").text("You need to give a name").addClass('text-danger');
                            return false;
                        }
                        myDropzone.processQueue(); // Tell Dropzone to process all queued files.

                    });

                    // Event to send your custom data to your server
                    myDropzone.on("sending", function(file, xhr, data) {

                        // First param is the variable name used server side
                        // Second param is the value, you can add what you what
                        // Here I added an input value
                        data.append("name", $('#name').val());
                        data.append("title", $('#title').val());
                        data.append("linkedin", $('#linkedin').val());

                    });

                    myDropzone.on("success", function(file, responseJson) {
                        if(responseJson.status == 1){
                            location.reload();
                        }

                    });
                } // End init
            });

        }); //End doc ready
    </script>
@endpush
