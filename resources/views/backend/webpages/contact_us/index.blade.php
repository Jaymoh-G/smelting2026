@extends('layouts.backend')

@push('styles')
    {{--<link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet"  />--}}
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
                    <form method="post" id="article_details_form" action="{{route('admin_about_page_save')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$about->id}}" name="about_id">
                        <div class="form-group article_content_holder">

                            <label for="intro">Intro</label>
                            <textarea id="intro" name="intro" >{{$about->intro}}</textarea>

                            <label for="who_we_are">Who we are</label>
                            <textarea id="who_we_are" name="who_we_are" >{{$about->who_we_are}}</textarea>

                            <label for="core_business">Core Business</label>
                            <textarea id="core_business" name="core_business" >{{$about->core_business}}</textarea>

                            <label for="who_we_work_with">Who we work with</label>
                            <textarea id="who_we_work_with" name="who_we_work_with" >{{$about->who_we_work_with}}</textarea>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mission">Mission</label>
                                    <textarea id="mission" name="mission" >{{$about->mission}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="vision">Vision</label>
                                    <textarea id="vision" name="vision" >{{$about->vision}}</textarea>
                                </div>
                            </div>



                            <div class="form-group mt-3 article_content_holder" id="sub_services_holder">
                                    <h3>Core Values</h3>
                                    @if(count($core_values) > 0)
                                        @foreach($core_values as $core_value)
                                            <div class="row mt-2 value_parent" id="{{$core_value->id}}">
                                                <input type="hidden" name="core_value_id[]" value="{{$core_value->id}}">
                                                <div class="col-md-4">
                                                    {{--<label for="title">Title</label>--}}
                                                    <input class="form-control" type="text" name="title[]" id="title" value="{{$core_value->title}}">
                                                </div>
                                                <div class="col-md-6">
                                                    {{--<label for="text">Text</label>--}}
                                                    <input class="form-control" type="text" name="text[]" id="text" value="{{$core_value->text}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="form-control btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> Remove <i class="fa fa-trash"></i> </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-sm btn-flat custom_button add_sub_service" id="add_sub_service"> Add a Core Value</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn mt-5 btn-success btn-sm custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> Save </button>
                                        <i class="fa fa-spinner ajax_spinner"></i>
                                        <div>
                                            <p class="ajax_success_p text-success"></p>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{ URL::asset('js/backend/tinymce/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function () {
            /*tinymce.init({
                selector: '#article_content'
            });*/
            tinymce.init({
                // selector: '#teaser'
                mode : "textareas",
                force_br_newlines : true,
                forced_root_block : ""
            });

            $('#add_sub_service').on('click', function(e){
                e.preventDefault();
                $('#sub_services_holder').append('<div class="row mt-2 value_parent">'+
                    '<div class="col-md-4">'+
                    '<input type="text" placeholder ="Title" class="form-control" name="title[]" required >'+
                    '</div>'+
                    '<div class="col-md-6">'+
                    '<input type="text" placeholder ="Text" class="form-control" name="text[]" required >'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '<button class="form-control btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> Remove <i class="fa fa-trash"></i> </button>'+
                    '</div>'+
                    '</div>');
            });

            $('.remove_subservice').on('click', function(e){

                e.preventDefault();

                // Remove the parent div from the DOM
                $(this).parents('.value_parent').remove();
            });
        }); //End doc ready
    </script>
@endpush
