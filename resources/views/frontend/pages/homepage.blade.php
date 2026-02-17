@extends('layouts.frontend')
<?php
use Illuminate\Support\Facades\Request;
?>
@push('styles')
    <link href="{{ asset('css/') }}" rel="stylesheet"  />
    <style>
        .email_success{
            display: none;
        }

        .spinner_submission{
            display: none;
        }
    </style>


@endpush
@section('content')
    @include('frontend.partials.jssor_banner')
    <!-- features-4 block -->
    <section class="w3l-features-4">
        <div id="features4-block" class="section-gap">
            <div class="wrapper">
                <div class="section-title align-center text-center mb-5 pb-5">
                    <h3 class="">WHO WE ARE </h3>
                    <p class="sub-paragraph mb-3">
                        {!! $about_us->who_we_are !!}
                    </p>
                    <a class="btn btn-outline-dark" href="{{route('front_about')}}">Read More About Us</a>
                </div>

                <div class="row mb-5 pb-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-shadow pt-3 pb-3 pl-3 pr-2">
                                    <div class="flex-container">
                                        <div class="mr-4">
                                            <i class="fa fa-bullseye fa-2x color-orange"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font700 text-dark"><a href="#" class="text-dark">Our Vision</a></h5>
                                            <p>
                                                {!! $about_us->vision !!}

                                            </p>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border: 1px solid re">
                                <div class="custom-shadow pt-3 pb-3 pl-3 pr-2">
                                    <div class="flex-container">
                                        <div class="mr-4">
                                            <i class="fa fa-eye fa-2x color-yellow"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-2 font700 "><a href="#" class="text-dark">Our Mission</a></h5>
                                            <p>
                                                {!! $about_us->mission !!}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5 pb-5">
                    <div class="col-md-12">
                        <div class="section-title align-center text-center">
                            <h3 class="">OUR CORE VALUES </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-shadow pt-3 pb-3 pl-3 pr-2">
                                    <div class="flex-container">
                                        <div>
                                            <ul class="core_values_ul">
                                                @foreach($value_set_1 as $value)
                                                    <li>
                                                        <strong>{{$value->title}} </strong> {{$value->text}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="border: 1px solid re">
                                <div class="custom-shadow pt-3 pb-3 pl-3 pr-2">
                                    <div class="flex-container">
                                        <div>
                                            <ul class="core_values_ul">
                                                @foreach($value_set_2 as $value)
                                                    <li>
                                                        <strong>{{$value->title}} </strong> {{$value->text}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="parallax">
                <div class="parallax-text-holder text-center">
                    <a href="{{route('front_contact')}}" class="btn yellow_background btn-flat" target="_blank" style="min-width: 250px"> Talk to Us</a>
                </div>
            </div>

            <div class="wrapper">
                <div class="section-title align-center text-center mb-5 mt-5 pt-5 ">
                    <h3 class="text-uppercase">Our Core Services </h3>
                </div>
                <div class="features4-grids text-center">
                    @foreach($areas_of_focus as $index => $area_of_focus)
                        <div class="features4-grid">
                            <div class="feature-icon text-center">
                                <img src="{{asset('images/area_of_focus/'.$area_of_focus->image_url)}}" style="position: relative; left: 0px !important;" class="service-img">
                            </div>
                            <h5><a href="#"> {{$area_of_focus->title}}</a></h5>
                            <p></p>
                            <a href="{{route('front_areas_of_focus')}}" class="gomore">Explore</a>
                        </div>
                    @endforeach


                </div>
                <div class="text-center mt-5 pt-3 mb-5" style="">

                </div>
            </div> <!-- End Wrapper -->


            <div class="wrapper mt-5 pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-uppercase text-center big-title">Accreditations</h3>
                    </div>
                </div>
                <div class="row mt-5 pt-5">
                    <div class="col-md-12">
                        <div class="row accreditations_row">
                            @foreach($accreditations as $accreditation)
                                <div class="col-md-4">
                                    <div class="text-center">
                                        @if($accreditation->show_title == 1)
                                            <p>{{$accreditation->title}}</p>
                                        @endif
                                        <img class="home-logo img img-fluid" src="{{asset('images/accreditation_images/'.$accreditation->image_url)}}" alt="{{$accreditation->title}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-4 block -->

    <div class="wrapper">
        <div class="section-title align-center text-center mb-5 pt-5 ">
            <h3 class="text-uppercase">Reach out to us</h3>
        </div>
        {{--        @include('frontend.partials.ajax-form-feedback')--}}

        <form action="{{route('sendMail')}}" method="post" id="theform">
            @csrf
            <div class="row mb-5" style="border: 1px solid re">
                <div class="col-md-10 offset-1">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="w3lName" name="w3lName" class="form-control mb-2" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="w3lCompany" name="w3lCompany" class="form-control mb-2" placeholder="Name of your company">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="w3lSender" name="w3lSender" class="form-control mb-2" placeholder="Your Email Address" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="w3lSubject" name="w3lSubject" class="form-control mb-2" placeholder="Subject of your message" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control mt-2" name="w3lMessage" id="w3lMessage" required placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center ">
                            <p class="create_errors text-danger mb-2" style="font-size: 0.9em; font-weight: 400;"></p>
                            <p class="success_text text-success mb-2" style="font-size: 0.9em; font-weight: 400;"></p>
                            <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable email_success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="fa fa-info pr10"></i>
                                Email successfully sent, we'll get back to you as soon as possible
                            </div>

                            <button id="btn_submit_form" class="btn " style="background-color: #FFCC01"> <i class="fa fa-spinner fa-spin text-success spinner_submission"></i> Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div> <!-- End Wrapper -->

@endsection

@push('scripts')
    <script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn_submit_form', function (e) {
                e.preventDefault();

                var form_fields = document.getElementById("theform").elements;
                var mandatory_fields_tracker = [];

                for (var i = 0, element; element = form_fields[i++];) {

                    // if (element.type === "text" || element.type === "number" || document.getElementById("w3lMessage").required === true){
                    if (element.type === "text" || element.type === "number" || element.type === "textarea"){
                        if(typeof element.attributes.required !== 'undefined') {
                            if (element.attributes.required.specified === true && element.value === "") {
                                // console.log(i + " REQUIRED --- " + element.attributes.name.value);
                                mandatory_fields_tracker.push(i);
                                element.style.border = "1px solid red";

                            }else if(element.attributes.required.specified === true && element.value != ""){
                                element.style.border = "1px solid #d2d6de";

                            }
                        }
                    }else if(element.type === "select-one"){
                        if(typeof element.attributes.required !== 'undefined') {
                            if(element.attributes.required.specified === true && element.value === "-- Select One --" || element.value == ""){
                                var parent = element.parentNode;
                                mandatory_fields_tracker.push(i);

                                parent.style.border = "1px solid red";
                            }else if(element.attributes.required.specified === true && element.value !== "-- Select One --"){
                                var parent = element.parentNode;
                                parent.style.border = "none";
                            }
                        }
                    }
                }

                // If all is good we submit the form
                /* $("#btn_create").attr("disabled", true);
                 $("#btn_create").text("Submitting Data ... ");*/
                // $("#theform").submit();
                // OBSOLETE
                /* var textarea_required = document.getElementById("w3lMessage").required;
                 console.log("textarea_required");
                 console.log(typeof textarea_required);
                 textarea_value = $('#w3lMessage').val();
                 console.log("textarea_value");
                 console.log(textarea_value);
                 if(textarea_required === true ){
                     mandatory_fields_tracker.push(99);
                 }
 */

                if(mandatory_fields_tracker.length >= 1){
                    $('.create_errors').text("The fields highlighted in red are required");
                }else{
                    // If all is good we submit the form
                    $('.create_errors').text("");
                    $("#btn_submit_form").attr("disabled", true);
                    $("#btn_submit_form").text("Submitting Message ... ");
                    $('.spinner_submission').css({'display' : 'inline'});
                    // $("#theform").submit();
                    // We wanna send the form by ajax here
                    /*$("form").submit(function (event) {
                        var formData = {
                            name: $("#w3lName").val(),
                            email: $("#w3lSender").val(),
                            company: $("#w3lCompany").val(),
                            message: $("#w3lMessage").val(),
                            subject: $("#w3lSubject").val(),
                        };

                        $.ajax({
                            type: "POST",
                            url: "{!! route('sendMailAjax') !!}",
                            data: formData,
                            dataType: "json",
                            encode: true,
                        }).done(function (data) {
                            console.log(data);
                        });

                        event.preventDefault();
                    });*/
                    var formData = {
                        w3lName: $("#w3lName").val(),
                        w3lSender: $("#w3lSender").val(),
                        w3lCompany: $("#w3lCompany").val(),
                        w3lMessage: $("#w3lMessage").val(),
                        w3lSubject: $("#w3lSubject").val(),
                    };
                    $.ajax({
                        url: '{!! route("sendMailAjax") !!}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': " {{csrf_token()}}"
                        },
                        data: {
                            formData
                        }
                    })
                        .done(function (response) {

                            response = JSON.parse(response);
                            if(response.Code == 200){
                                $("#btn_submit_form").attr("disabled", false);
                                $('.spinner_submission').css({'display' : 'none'});
                                $("#btn_submit_form").text("Send Message");
                                $('.email_success').css({"display":"block"});
                            }

                        })//end done

                        .fail(function (xhr) {
                            console.log("AJAX Error on delete bulk: ", xhr);
                        }); //end fail
                }

            });
        }); // end doc ready
    </script>
@endpush
<script>
    // import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    // export default {
    //     components: {Button}
    // }
</script>
<script>
    // import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    // export default {
    //     components: {Button}
    // }
</script>
<script>
    // import Input from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Input";
    // export default {
    //     components: {Input}
    // }
</script>
<script>
    // import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    // export default {
    //     components: {Button}
    // }
</script>
