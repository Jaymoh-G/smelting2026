@extends('layouts.frontend')
<?php
use Illuminate\Support\Facades\Request;
use App\Models\SubService;
?>
@push('styles')
    <link href="{{ asset('css/areas-of-focus.css') }}" rel="stylesheet"  />


@endpush
@section('content')
    <!-- Headers-4 block -->
    <!-- inner banner -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner about-inner-foci">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    {{--<h3>Areas of Focus</h3>--}}
                    <h1 class="text-uppercase">Areas of Focus</h1>
                    {{--<li><a href="index.html">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">Areas of Focus</li>--}}
                </ul>
            </div>
        </div>
    </section>

    <!-- /blog-post-single -->
    <section class="w3l-blog-single-post-main">
        <div class="container pr-5 pl-5 mt-5 mb-5" >
            <div class="row mb-5 text-center focus-wrapper-row pl-md-5" style="border: 1px solid blu">
                @foreach($areas_of_focus as $index => $area_of_focus)
                    @if($index % 2 == 0)
                        <div class="row mt-5 mb-5 flex-container shadow-card">

                            <div class="col-md-6 col-sm-12 focus-image mb-3">
                                <img src="{{asset('images/area_of_focus/'.$area_of_focus->image_url)}}" alt="Image" class="img-fluid">
                            </div>
                            <div class="col-md-6 col-sm-12 pull-right  focus-text" style="">
                                <h4 class="mb-3 text-capitalize focus-title">{{$area_of_focus->title}}</h4>
                                <p class="text-left mb-2" style="font-size: 15px;">{!! $area_of_focus->content !!}</p>

                                <?php
                                $subs = SubService::where('parent_service_id', $area_of_focus->id)->get();

                                ?>
                                <ul class="text-left my_lists">
                                    @foreach ($subs as $sub)
                                        <li style="margin-bottom: 1em;"> <i class="fa fa-list"></i> {{$sub->title}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="row mt-5 mb-5 flex-container shadow-card">
                            <div class="col-md-6 col-sm-12 pull-left focus-text" style="">
                                <h4 class="mb-3 text-capitalize focus-title">{{$area_of_focus->title}}</h4>
                                <p class="text-left mb-2" style="font-size: 15px;">{!! $area_of_focus->content !!}</p>

                                <?php
                                $subs = SubService::where('parent_service_id', $area_of_focus->id)->get();

                                ?>
                                <ul class="text-left my_lists">
                                    @foreach ($subs as $sub)
                                        <li style="margin-bottom: 1em;"> <i class="fa fa-list"></i> {{$sub->title}} </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class=" col-md-6 col-sm-12 focus-image mb-3">
                                <img src="{{asset('images/area_of_focus/'.$area_of_focus->image_url)}}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </section>
    <!-- //blog-post-single -->
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
