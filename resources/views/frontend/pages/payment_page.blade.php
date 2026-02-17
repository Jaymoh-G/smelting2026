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

                if($('#phone_number').val() == "" || $('#phone_number').val().length < 9){

                    $('.ajax_status span').text("Please enter a valid 9-digit phone number (e.g. 712345678)").addClass('text-danger');
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
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': " {{csrf_token()}}"
                    },
                    data: {
                        phone_number_pt1: phone_number_pt1,
                        phone_number: phone_number,
                        resource: resource,
                        registrant_id: registrant_id
                    }
                })
                    .done(function (response) {
                        $('.ajax_status i').css({'display':'none'});
                        document.getElementById("new_donation_yes").disabled = false;

                        if (typeof response === 'string') {
                            try { response = JSON.parse(response); } catch (e) { response = {}; }
                        }
                        if (response && response.Code == 200) {
                            $('#new_donation_yes').css({"display" : "none"});
                            $('#stk_success').css({'display':'block'});
                            $('#stk_success span').text(response.Description || "A notification has been sent to your phone. Please enter your M-Pesa PIN to complete the payment.");
                        } else {
                            $('#stk_fail').css({'display':'block'});
                            $('#stk_fail span').text(response && response.Description ? response.Description : "Payment request failed. Please try again.");
                        }
                    })
                    .fail(function (xhr) {
                        $('.ajax_status i').css({'display':'none'});
                        document.getElementById("new_donation_yes").disabled = false;
                        $('#stk_fail').css({'display':'block'});
                        var errMsg = "Payment request failed. ";
                        if (xhr.responseJSON && xhr.responseJSON.Description) {
                            errMsg = xhr.responseJSON.Description;
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errMsg += xhr.responseJSON.message;
                        } else if (xhr.status === 500) {
                            errMsg += "Please check your M-Pesa credentials in .env and ensure LIVE_CREDENTIALS_URL, LIVE_STK_PUSH_URL, LIVE_MPESA_API_STK_CALLBACK are set.";
                        }
                        $('#stk_fail span').text(errMsg);
                    });
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
