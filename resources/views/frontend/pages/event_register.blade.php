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
    
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    
            <div class="container">
                @if($resource->visibility == 'hidden')
            		<section class="w3l-inner-banner">
            			<div class="workinghny-content text-center">
            				<div class="container">
            					<div class="workinghny-content-bottom">
            						<p class="page-title">Event no longer available for Registration</p>
            					</div>
            				</div>
            			</div>
            		</section>
            	@else
            	    <h6>Please fill the form below to register</h6>
                    <form method="POST" action="{{route('submit_registration')}}" id="application_form">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="event_id">
                        @include('frontend.partials.form-feedback')
                        <div class="row pr-5 pl-5">
                            <div class="col-md-6 text-center">
                                
                                <div class="form-group">
                                    <select class="form-control" name="salutation" id="salutation" required>
                                        <option value="">Select Salutation</option>
                                        <option value="Mr" {{ (Request::old("salutation") == "Mr" ? "selected":"") }}>Mr</option>
                                        <option value="Mrs" {{ (Request::old("salutation") == "Mrs" ? "selected":"") }}>Mrs</option>
                                        <option value="Miss" {{ (Request::old("salutation") == "Miss" ? "selected":"") }}>Miss</option>
                                        <option value="Dr" {{ (Request::old("salutation") == "Dr" ? "selected":"") }}>Dr</option>
                                        <option value="Prof" {{ (Request::old("salutation") == "Prof" ? "selected":"") }}>Prof</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="first_name" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="last_name" name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" required value="{{ old('email_address') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required value="{{ old('phone_number') }}">
                                </div>
                                {{-- <div class="form-group">
                                    <select class="form-control" name="country" id="country" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->name}}" {{ (Request::old("country") == $country->name ? "selected":"" )}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <input class="form-control" id="city" name="city" placeholder="City" required value="{{ old('city') }}">
                                </div>
                            </div>
        
                            <!-- THIRD COL -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" id="company" name="company" placeholder="Company" required value="{{ old('company') }}">
                                    </div>
                                    @foreach($extra_fields as $ef) 
                                    <div class="form-group">
                                        <label for="{{ Str::slug($ef->name_of_form_field) }}">
                                            {{ ucfirst($ef->name_of_form_field) }}
                                            @if($ef->is_required)<span class="text-danger">*</span>@endif
                                        </label>
                                        <input class="form-control" id="{{ Str::slug($ef->name_of_form_field) }}" name="{{ Str::slug($ef->name_of_form_field) }}" placeholder="{{ ucfirst($ef->name_of_form_field)}}" {{ $ef->is_required ? 'required' : '' }} value="{{ old(Str::slug($ef->name_of_form_field)) }}">
                                    </div>
                                    @endforeach
                                    
                                    {{-- <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="Send a copy to my email" id="send_email_copy" name="send_email_copy" {{ (Request::old("send_email_copy") == "Send a copy to my email" ? "checked":"" )}}>
                                        <label class="form-check-label" for="send_email_copy">
                                            Send a copy to my email
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="I consent to this website collecting my details through this form." id="accepted_terms" name="accepted_terms" required {{ (Request::old("accepted_terms") == "I consent to this website collecting my details through this form." ? "checked":"" )}}>
                                        <label class="form-check-label" for="accepted_terms">
                                            I consent to this website collecting my details through this form.
                                        </label>
                                    </div>
         --}}
        {{--                            <input type="submit" name="btn_submit" id="btn_submit" class="submit action-button" value="Submit "/>--}}
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <textarea class="form-control" name="message" id="message" placeholder="Any extra information" rows="6"></textarea>
                                @if($resource->pricingMode == 'paid')
                                    <input type="submit" class="btn yellow_background btn-flat form-control mt-3 submit" value="Proceed to Payment">
                                @else
                                    <input type="submit" class="btn yellow_background btn-flat form-control mt-3 submit" value="Submit">
                                @endif
                            </div>
                            <br/>
                        </div>
                    </form>
                @endif
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
