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
                    <h3 class="mb-5">Registration for:  {{$resource->title}}</h3>
                    <p class="mb-4">You registration for event {{$resource->title}} was received successfully</p>
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
@endpush
