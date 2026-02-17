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
                    <form method="post" id="article_details_form" action="{{route('store_accreditation')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" value="{{$resource->id}}" name="resource_id"> --}}
                        <div class="form-group article_content_holder">
                            <label for="title">Title of the accreditation</label>
                            <input type="text" class="form-control mb-4" name="title" id="title">

                            <label for="show_title">Show Title</label>
                            <select class="form-control" id="show_title" name="show_title">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>


                            <div class="col-md-12 mt-4 mb-4">
                                <label class="text-left text-capitalize"> Add Featured Image</label>
                                <br>

                                <input id="accreditation_image" type="file" class="form-control" name="accreditation_image">
                                <br>
                            </div>


                            <button type="submit" class="ml-1 btn btn-success btn-sm btn-flat custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> &nbsp;  &nbsp;  &nbsp; Save  &nbsp;  &nbsp;  &nbsp;  </button>
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

    <script>

        $(document).ready(function () {

        }); //End doc ready
    </script>
@endpush
