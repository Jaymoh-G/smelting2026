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
        <div class="about-inner about-inner-events">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    <h1 class="text-uppercase">Events & Trainings</h1>
                    {{--<li><a href="index.html">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">Events & Trainings</li>--}}
                </ul>
            </div>
        </div>
    </section>

    <!-- blog -->
    <section class="w3l-blog-main-61">
        <!-- /grids -->
        <div class="grids-layout">
            <div class="wrapper">
                <div class="gallery-25-content">
                    <div class="d-grid grid-columns">

                        @if($active_events >= 1)
                            @foreach($resources as $resource)
                            <div class="blg-tp">
                                <div class="column one-blog">
                                    <div class="box13">
                                        <a href="{{route('front_event_single', ['id' => $resource->id])}}"><img class="side-img" src="{{asset('images/event_images/'.$resource->image_url)}}" alt="Event Image" /></a>
                                    </div>
                                </div>
                                <div class="column two two-blog">
                                    <div class="box13">
                                        <h3><a href="{{route('front_event_single', ['id' => $resource->id])}}">{{$resource->title}}</a></h3>
                                        <ul class="admin-list">
                                            <li>From: <a href="#"><span class="fa fa-calendar" aria-hidden="true"></span>{{date("jS F Y", strtotime($resource->start_date))}}</a></li>
                                            <li>To: <a href="#"><span class="fa fa-calendar" aria-hidden="true"></span>{{date("jS F Y", strtotime($resource->end_date))}}</a></li>
                                            <!-- <li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>by Admin</a></li> -->
                                            <!-- <li><a href="#"><span class="fa fa-commenting-o" aria-hidden="true"></span>9
                                                    Comments</a></li> -->
                                        </ul>

                                        <ul class="admin-list">
                                            <li>Where: <a href="#"><span class="fa fa-map-marker" aria-hidden="true"></span>{{$resource->location}}</a></li>
                                            <li>Price: <a href="#">
                                                @if($resource->pricingMode == 'free')
													<span class="" aria-hidden="true">Free</span>
												@else
													<span class="" aria-hidden="true">KES </span>{{$resource->cost}}
												@endif
                                            </a></li>
                                        </ul>
                                        {{$resource->description}}
                                        <div class="button"><a href="{{route('front_register_for_event', ['id' => $resource->id])}}" class="actionbg btn">Register <span
                                                    class="fa fa-angle-double-right" aria-hidden="true"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3 class="text-center">There are no active events at the moment</h3>
                        @endif
                    </div>
                    <!---728x90--->

                </div>

            </div>
        </div>
        </div>
        <!-- //grids -->
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
