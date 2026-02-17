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
    {{--<section class="w3l-inner-banner-main">
        <div class="about-inner">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    <h3>Blog</h3>
                    <li><a href="index.html">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </section>--}}
    <section class="w3l-contacts-9-main">

        <!---728x90--->

        <div class="contacts-9">
            <div class="wrapper">
                <div class="top-map">

                    <div class="map-content-9">
                        @include('frontend.partials.form-feedback')

                        <form action="{{route('sendMail')}}" method="post">
                            @csrf

                            <div class="form-top1">
                                <h3>Contact Us</h3>
                                <div class="form-top">

                                    <div class="form-top-left">

                                        <input type="text" name="w3lName" id="w3lName"  placeholder="Name" required="">
                                        <input type="email" name="w3lSender" id="w3lSender" placeholder="Email" required="">
                                        <input type="text" name="w3lCompany" id="w3lCompany"  placeholder="Company" required="">
                                        <input type="text" name="w3lSubject" id="w3lSubject"  placeholder="Subject" required="">
                                    </div>
                                    <div class="form-top-righ">
                                        <textarea name="w3lMessage" id="w3lMessage" placeholder="Message" rows="11" required=""></textarea>
                                        <button type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row mt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1652586275786!2d37.07073261400575!3d-1.0366785356953856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f4e8ff077f053%3A0xe2b57996b7cc32c0!2sEquity%20Plaza!5e0!3m2!1sen!2ske!4v1637673468448!5m2!1sen!2ske" width="1600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="cont-details">
                        <div class="cont-top">
                            <h6><span class="fa fa-map-marker"></span> Physical Location</h6>
                            <p>{{$contact_data->physical_location}}</p>
                        </div>
                        <div class="cont-top">
                            <h6><span class="fa fa-phone"></span> Phones</h6>
                            <ul>
                                @foreach($phones as $phone)
                                    <li>{{$phone}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="cont-top">
                            <h6><span class="fa fa-envelope"></span>  Emails</h6>
                            <ul>
                                @foreach($emails as $email)
                                    <li>{{$email}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
