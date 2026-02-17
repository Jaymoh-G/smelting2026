@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/datetime/bootstrap-datetimepicker.css')}}">
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
                    <form method="post" id="article_details_form" action="{{route('update_event')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="resource_id">
                        <div class="form-group article_content_holder">
                            <label for="title">Title of the event</label>
                            <input type="text" class="form-control mb-4" name="title" id="title" required value="{{$resource->title}}">

                            <label for="location">Location of the event</label>
                            <input type="text" class="form-control mb-4" name="location" id="location" value="{{$resource->location}}" required>
                            
                            <label for="visibility">Visibility</label>
                            <select class="form-control mb-4" aria-label="Default select example" name="visibility">
                              <option value="visible" @if($resource->visibility == 'visible') selected @endif>Visible</option>
                              <option value="hidden" @if($resource->visibility == 'hidden') selected @endif>Hidden</option>
                            </select>
                            
                            <label for="pricing">Pricing</label>
                            <select class="form-control mb-4 pricing-mode" aria-label="Default select example" name="pricingMode">
                                <option value="paid" @if($resource->pricingMode == 'paid') selected @endif>Paid</option>
                                <option value="free" @if($resource->pricingMode == 'free') selected @endif>Free</option>
                            </select>

							<div class="price-holder" id="priceHolder">
								<label for="location">Cost of the event</label>
								<input type="number" class="form-control mb-4" name="cost" id="cost" value="{{$resource->cost}}" required>
							</div>

                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control mb-4">{{$resource->description}}</textarea>

                            <label for="title" class="mt-4">Event Dates</label>
                            {{-- <div class="form-group">
                                <label for="start_date" class="col-md-3">Start Date</label>
                                <div class="col-md-9">
                                    <div class='input-group date' id='datetimepicker9'>
                                        <input type='text' class="form-control" name="start_date" id="datetimepicker9txt" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_date" class="col-md-3">End Date</label>
                                <div class="col-md-9">
                                    <div class='input-group date' id='datetimepicker10'>
                                        <input type='text' class="form-control" name="end_date" id="datetimepicker10txt" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}
                            <br>
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{$resource->start_date}}" required>

                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{$resource->end_date}}" required>

                            <br>

                            <div class="mt-3">
                                <span>Draft</span>
                                <label class="switch">
                                    <input type="radio" name="is_draft_or_publish" checked value="is_draft">
                                    <span class="slider"></span>
                                </label>
                                &nbsp; &nbsp; &nbsp;
                                <span>Publish</span>
                                <label class="switch">
                                    <input type="radio" name="is_draft_or_publish" value="is_published">
                                    <span class="slider"></span>
                                </label>
                            </div>

                            <div class="col-md-12 mt-4 mb-4">
                                <label class="text-left text-capitalize"> Add Featured Image</label>
                                <br>
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
                                <input id="image" type="file" class="form-control" name="image">
                                <br>
                                
                                <div>
                                    <h4>EVENT SPECIFIC FIELDS </h4>

                                    @if(!is_null($event_extra_data))
                                    <div id="sub_services_holder">
                                        @foreach($event_extra_data as $event_extra_datum)
                                            <div class="mb-4"> <label>Name of Field</label><input type="text" value="{{$event_extra_datum->name_of_field}}" class="form-control" name="name_of_field[]" required style="display:inline; width: 89%"><br><label>Value of Field</label><br><input type="text" value="{{$event_extra_datum->value_of_field}}" class="form-control" name="value_of_field[]" required style="display:inline; width: 89%"> <button class="btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> Remove <i class="fa fa-trash"></i> </button></div>
                                        @endforeach
                                    </div>
                                    @endif

                                    <button class="btn btn-success btn-sm btn-flat custom_button" id="add_sub_service">&nbsp;&nbsp;&nbsp;&nbsp; Add a Field &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                               

                                
                                <div>
                                    <h4>ADDITIONAL FORM FIELDS </h4>

                                    @if(!is_null($extra_fields))
                                    <div id="extra_form_fields_holder">
                                        @foreach($extra_fields as $ef)
                                            <div class="mb-4 extra-form-field-row"> 
                                                <label>Name of Field</label>
                                                <input type="text" value="{{$ef->name_of_form_field}}" class="form-control" name="name_of_form_field[]" required style="display:inline; width: 89%">
                                                <label class="ml-2 mt-2">
                                                    <input type="hidden" name="is_required[]" value="{{ $ef->is_required ? '1' : '0' }}" class="is-required-hidden">
                                                    <input type="checkbox" class="is-required-checkbox" {{ $ef->is_required ? 'checked' : '' }}> Required
                                                </label>
                                                <button class="btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> Remove <i class="fa fa-trash"></i> </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div id="extra_form_fields_holder"></div>
                                    @endif

                                    <button class="btn btn-success btn-sm btn-flat custom_button" id="add_form_field">&nbsp;&nbsp;&nbsp;&nbsp; Add a Field &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                                

                                <br>
                                <br>
                            </div>

                            {{-- <textarea id="teaser" name="article_content" >{{$resource->article_content}}</textarea> --}}
                            <button type="submit" class="ml-1 btn btn-success btn-sm btn-flat custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> &nbsp;  &nbsp;  &nbsp; Save Event  &nbsp;  &nbsp;  &nbsp;  </button>
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
    <script src="{{ URL::asset('js/backend/datetime/moment-with-locales.min.js') }}" ></script>
    <script src="{{ URL::asset('js/backend/datetime/bootstrap-datetimepicker.min.js') }}" ></script>
    <script>
         // Turn off autodiscover for dropzone
         // Dropzone.autoDiscover = false;
        $(document).ready(function () {
            tinymce.init({
                // selector: '#teaser'
                mode : "textareas",
                forced_root_block : ""
            });
            // init({forced_root_block : "",selector:'textarea'})

            $('.pricing-mode').on('change', function(){
				let selected = $(this).val();
				console.log(selected);
				if(selected == 'paid'){
					$('#priceHolder').show();
					$('#cost').prop('disabled', false);
				}else{
					$('#priceHolder').hide();
					$('#cost').prop('disabled', true);
				}
			}).change();

            $('#datetimepicker9').datetimepicker({
                format: 'dddd, MMMM Do YYYY, h:mm:ss a',
                minDate:moment(),
                showClose:true
            });
            $('#datetimepicker10').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: 'dddd, MMMM Do YYYY, h:mm:ss a',
                showClose:true

            });
            $("#datetimepicker9").on("dp.change", function (e) {
                $('#datetimepicker10').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker10").on("dp.change", function (e) {
                $('#datetimepicker9').data("DateTimePicker").maxDate(e.date);
            });

            $i = 0;
            $('#add_sub_service').on('click', function(e){
                e.preventDefault();

                $('#sub_services_holder').append('<div class="mb-4"> <label>Name of Field</label><input type="text" class="form-control" name="name_of_field[]" required style="display:inline; width: 89%"> <label>Value of Field</label><br><input type="text" class="form-control" name="value_of_field[]" required style="display:inline; width: 89%"> <button class="btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> Remove <i class="fa fa-trash"></i> </button></div>');
            });

            $('#add_form_field').on('click', function(e){
                e.preventDefault();
                $i++;
                $('#extra_form_fields_holder').append(`
                <div class="mb-4 extra-form-field-row" id="extra${$i}"> 
                    <label>Name of Form Field</label>
                    <input type="text" class="form-control" name="name_of_form_field[]" 
                        required style="display:inline; width: 89%"> 
                    <label class="ml-2 mt-2">
                        <input type="hidden" name="is_required[]" value="0" class="is-required-hidden">
                        <input type="checkbox" class="is-required-checkbox"> Required
                    </label>
                    <button type="button" class="btn btn-sm btn-danger btn-flat btn-inline remove_subservice"> 
                        Remove <i class="fa fa-trash"></i> 
                    </button>
                </div>`);
            });

            $(document).on('click', '.remove_subservice', function(e){
                e.preventDefault();
                $(this).closest('.mb-4').remove();
            });

            $(document).on('change', '.is-required-checkbox', function(){
                var hidden = $(this).siblings('.is-required-hidden');
                hidden.val($(this).is(':checked') ? '1' : '0');
            });

            $('#article_details_form').on('submit', function(){
                $('.extra-form-field-row').each(function(){
                    var cb = $(this).find('.is-required-checkbox');
                    var hidden = $(this).find('.is-required-hidden');
                    if (hidden.length && cb.length) {
                        hidden.val(cb.is(':checked') ? '1' : '0');
                    }
                });
            });
        }); //End doc ready
    </script>
@endpush
