@extends('layouts.frontend')
<?php
use Illuminate\Support\Facades\Request;
?>
@push('styles')
<link href="{{ asset('css/') }}" rel="stylesheet"  />


@endpush
@section('content')
<!-- Headers-4 block -->
<!-- inner banner -->


<!-- blog -->
<section class="w3l-blog-main-61">
    <div class="container-fluid mt-5">
        <div class="row mb-5 mt-5">
            <div class="col-md-12 text-center">

                <h5 class="mb-5">Registration for:  {{$resource->title}}</h5>
                <h6>Please enter the phone number you will be using to pay then click proceed.</h6>
                <h6>You will receive a notification on that phone number to enter your M-PESA password to authorize the transaction.</h6>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container">
        <form method="POST" action="{{route('take_payment')}}" id="application_form">
            @csrf
            <input type="hidden" value="{{$resource->id}}" name="event_id">
            @include('frontend.partials.form-feedback')
            <div class="row pr-5 pl-5">
                <div class="col-md-6 offset-3 text-center">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" id="take_payment_phone_number" name="take_payment_phone_number" placeholder="Phone Number" required value="{{ old('take_payment_phone_number') }}">
                    </div>
                    <input type="submit" class="btn yellow_background btn-flat form-control mt-3 submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</section>
<!-- //form -->
<!---728x90--->

@endsection

@push('scripts')
<script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
<script>
    $(document).ready(function () {

    }); // end doc ready
</script>
@endpush
<script>
    import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    export default {
        components: {Button}
    }
</script>
