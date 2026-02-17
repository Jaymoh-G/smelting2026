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
        <div class="about-inner about-inner-blog">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    {{--<h3>Blog</h3>--}}
                    <h1 class="text-uppercase">Blog</h1>
                    {{--<li><a href="{{route('home')}}">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">Blog</li>--}}
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


                        @foreach($blog_items as $blog_item)
                        <div class="blg-tp">
                            <div class="column one-blog">
                                <div class="box13">
                                    <a href="{{route('front_blog_single', ['id' => $blog_item->id])}}"><img class="side-img" src="{{asset('images/blog_images/'.$blog_item->image_url)}}" alt="Blog Image" /></a>
                                </div>
                            </div>
                            <div class="column two two-blog">
                                <div class="box13">
                                    <h3><a href="{{route('front_blog_single', ['id' => $blog_item->id])}}">{{$blog_item->title}}</a></h3>
                                    <ul class="admin-list">
                                        <li><a href="#"><span class="fa fa-calendar" aria-hidden="true"></span>{{$blog_item->date_published}}</a></li>
                                        <!-- <li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>by Admin</a></li> -->
                                        <!-- <li><a href="#"><span class="fa fa-commenting-o" aria-hidden="true"></span>9
                                                Comments</a></li> -->
                                    </ul>
                                    {!! $blog_item->teaser !!}
                                    <div class="button"><a href="{{route('front_blog_single', ['id' => $blog_item->id])}}" class="actionbg btn">Read More <span
                                                class="fa fa-angle-double-right" aria-hidden="true"></span></a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

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
