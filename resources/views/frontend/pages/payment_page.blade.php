@extends('layouts.frontend')
<?php
use Illuminate\Support\Facades\Request;
?>
@push('styles')
    <link href="{{ asset('css/') }}" rel="stylesheet"  />
    <style>
        .ajax_status i{
            display: none;
            position: relative;
            top: 7px;
        }

        #stk_success, #stk_fail {
            display: none;
        }
    </style>

@endpush
@section('content')
    <!-- Headers-4 block -->
    <!-- inner banner -->


    <!-- blog -->
    <section class="w3l-blog-main-61">
        <div class="container-fluid mt-5">
            <div class="row mb-5 mt-5">
                <div class="col-md-6 offset-3 text-center">

                    <h5 class="mb-5">Payment for:  {{$resource->title}}</h5>
                    <h6 class="mb-4">You will be paying KES {{$resource->cost}}</h6>
                    <h6></h6>
                    <h6 class="mb-4">Enter the phone number you will be using to pay, then click the button below to receive a notification on your phone so that you can authorize the payment by entering your PIN</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="phone_number_pt1" id="phone_number_pt1" class="form-control" value="254" disabled>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" value="{{$resource->id}}" id="resource">
                            <input type="hidden" value="{{$registrant_id}}" id="registrant_id">
                            <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" maxlength="10" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                    <p class="ajax_status">
                        <i>
                            <img src="{{asset('images')}}/bean_eater.svg">
                        </i>
                        <br>
                        <span></span>
                    </p>
                    <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable" id="stk_success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info pr10"></i>
                        <span></span>
                    </div>
                    <div class="alert alert-micro alert-border-left alert-danger pastel alert-dismissable" id="stk_fail">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info pr10"></i>
                        {{ Session::get('failure') }}
                    </div>
                    <button class="btn yellow_background btn-flat form-control mt-3 submit" id="new_donation_yes"> Pay </button>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- //form -->
    <!---728x90--->

@endsection

@push('scripts')
    <script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
    <script>
        $(document).ready(function () {
            $(document).on('click','#new_donation_yes', function(){
                $('.ajax_status i').css({'display':'inline'});

                if($(".modal-body #phone_number").val() == ""){

                    $('.ajax_status span').text("Phone Number cannot be empty").addClass('text-danger');
                    $('.ajax_status i').css({'display':'none'});
                    return;
                }

                // I think here we wanna disable both buttons
                document.getElementById("new_donation_yes").disabled = true;

                $('.ajax_status span').empty().removeClass('text-danger','text-success');
                $('.ajax_status i').css({'display':'inline'});

                phone_number_pt1   = $('#phone_number_pt1').val();
                phone_number       = $('#phone_number').val();
                resource           = $('#resource').val();
                registrant_id      = $('#registrant_id').val();

                console.log(phone_number_pt1);
                console.log(phone_number);
                $.ajax({
                    url: '{!! route("takePayment") !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': " {{csrf_token()}}"
                    },
                    data: {
                        phone_number_pt1:phone_number_pt1,
                        phone_number:phone_number,
                        resource:resource,
                        registrant_id:registrant_id
                    }
                })
                    .done(function (response) {
                        console.log("RESPONSE");
                        console.log(response.Code);
                        $('.ajax_status i').css({'display':'none'});
                        response = JSON.parse(response);
                        if(response.Code == 200){

                            $('#new_donation_yes').css({"display" : "none"});
                            $('#stk_success').css({'display':'block'});
                            $('#stk_success span').text("A notification has been sent to the provided phone number, if you authorize it you will receive a receipt on the registered email address");

                            // Wait for a few seconds after showing message to close the modal.
                            // Anonymous function as timeout
                            /*setTimeout(function(){
                                $('#new_donation').modal('hide');
                            }, 10000);*/
                        }else {
                            // Show error message
                            $('#stk_fail').css({'display':'block'});
                            $('#stk_fail span').text(response.Description);

                            // Hide button
                            $('#new_donation_yes').css({"display" : "none"});

                        }


                    })//end done

                    .fail(function (xhr) {

                    }); //end fail
            });

        }); // end doc ready
    </script>
@endpush
<script>
   /* import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    export default {
        components: {Button}
    }*/
</script>
<script>
    /*import Input from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Input";
    export default {
        components: {Input}
    }*/
</script>
<script>
    /*import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    export default {
        components: {Button}
    }*/
</script>
<script>
    /*import Input from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Input";
    export default {
        components: {Input}
    }*/
</script>
