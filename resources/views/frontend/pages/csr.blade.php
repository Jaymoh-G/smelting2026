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
    <section class="w3l-inner-banner-main">
        <div class="about-inner">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    <h3>Our Corporate Social Responsibility</h3>
                    <li><a href="index.html">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">CSR</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="w3l-blog-single-post-main">
        <div class="container pr-5 pl-5 mt-5 mb-5">
            <div class="row mb-5">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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
