@extends('layouts.forms')
@push('styles')
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #4CAF50;
            cursor: pointer;
        }

        .icheckbox_square-blue,
        .iradio_square-blue {

            width: 15px;
            height: 15px;

        }

    </style>
    <link href="{{ asset('css/admin/regform_styles.css') }}" rel="stylesheet">

@endpush
@section('content')
    <h1 class="error">{{env('SITE_NAME')}}</h1>
    <div class="w3layouts-two-grids">
        <!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">

                <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="">
                <div class="w3layouts_more-buttn">

                </div>
            </div>
            <div class="txt-left-side2">
                @include('admin.partials.register-form-feedback')
                <h2> To proceed with creating your account, add your name and password below </h2>
                <form action="{{ route('userCreateSelfPost') }}" method="post">
                    @csrf

                    <div class="row">
                        <input type="hidden" name="invite_email" value="{{$invite->email}}">
                        <input type="hidden" name="invited_by" value="{{$invite->invited_by}}">

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="user_name" placeholder="Your Name" required value="{{ old('user_name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback" style="margin-bottom: 2em;">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btnn">
                            <button type="submit">Proceed &nbsp; <i class="fa fa-angle-right"></i> </button>
                        </div>
                    </div>
                </form>

                <div class="clear"></div>
            </div>

        </div>
    </div>
    <br/>
    <br/>
    <br/>

    <footer class="copyrigh-wthree">
        <p>
            © 2019 UjuziKilimo Solutions. All Rights Reserved

        </p>
    </footer>
@endsection
@push('scripts')

    <script>

        $(document).ready(function(){

            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;

            };

        });
    </script>

@endpush

