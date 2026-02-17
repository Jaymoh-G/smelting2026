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
                    <h3>{{$event->title}}</h3>
                    <li><a href="{{route('home')}}">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
                    <li class="active">{{$event->title}}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- /blog-post-single -->
    <section class="w3l-blog-single-post-main">

        <div class="blog-post-single-61">
            <div class="wrapper">
                <!-- left side blog post content -->
                <div class="single-left">
                    <div class="single-left1 box13">

                        <img class="side-img" style="max-width: 600px; height: auto;" src="{{asset('images/event_images/'.$event->image_url)}}" alt="Event Image" />

                        <h3 class="card-title"> {{$event->title}} </h3>
                        <h3 class="card-title">Location: {{$event->location}} </h3>
                        <h4 class="">Cost: {!! $event->cost !!} </h4>
                        <hr/>
                        @foreach ($extra_data as $ed)
                            <h4 class="">{{$ed->name_of_field}}: {{$ed->value_of_field}} </h4>
                        @endforeach
                        <hr/>
                        <ul class="admin-list">
                            <h5>
                                <a href="#">
                                    <span class="fa fa-calendar" aria-hidden="true"></span>
                                     {{$event->start_date}}
                                </a> - 
                                <a href="#">
                                    <span class="fa fa-calendar" aria-hidden="true"></span>
                                     {{$event->end_date}}
                                </a>
                            </h5>
                            <!-- <li><a href="#"><span class="fa fa-user" aria-hidden="true"></span>by Admin</a></li>
                            <li><a href="#"><span class="fa fa-commenting-o" aria-hidden="true"></span>9
                                    Comments</a></li> -->
                        </ul>
                        


                        <p class="">{!! $event->description !!}</p>
                    </div>
                    <!-- <div class="social-share">
                        <h3 class="aside-title">Share This Post :</h3>
                        <div class="social-icons-section">
                            <a class="facebook" href="#team">
                                <span class="fab fa-facebook"></span>
                            </a>
                            <a class="twitter" href="#team">
                                <span class="fab fa-twitter"></span>
                            </a>
                            <a class="instagram" href="#team">
                                <span class="fab fa-instagram"></span>
                            </a>
                            <a class="pinterest" href="#team">
                                <span class="fab fa-pinterest"></span>
                            </a>
                        </div>
                    </div> -->
                    <!-- <div class="comments">
                        <h3 class="aside-title ">Recent Comments</h3>
                        <div class="comments-grids">
                            <div class="media">
                                <img class="img-responsive" src="{{asset('images/ts1.jpg')}}" alt="placeholder image">

                                <div class="media-body comments-grid-right">
                                    <h4>Henry Nicholas</h4>
                                    <ul class="">
                                        <li class="font-weight-bold">15 Oct  2019

                                        </li>

                                    </ul>
                                    <p>Nullam facilisis diam non magna porta luctus. Aenean facilisis erat posuere erat ornare ultrices. Aliquam ac arcu interdum,Aliquam ac arcu interdum, dapibus nibh convallis, semper augue.</p>
                                    <a href="#comment" class="replay"><span class="fa fa-reply"></span> Reply</a>
                                </div>
                            </div>
                            <div class="media second-part">
                                <img class="img-responsive" src="{{asset('images/ts2.jpg')}}" alt="placeholder image">
                                <div class="media-body comments-grid-right">
                                    <h4>Shane Watson</h4>
                                    <ul class="my-2">
                                        <li class="font-weight-bold">20 Oct 2019

                                        </li>

                                    </ul>
                                    <p>Nullam facilisis diam non magna porta luctus. Aenean facilisis erat posuere erat ornare ultrices. Aliquam ac arcu interdum,Aliquam ac arcu interdum, dapibus nibh convallis, semper augue.</p>
                                    <a href="#comment" class="replay"><span class="fa fa-reply"></span> Reply</a>
                                </div>
                            </div>
                            <div class="media third-part">
                                <img class="img-responsive" src="{{asset('images/ts3.jpg')}}" alt="placeholder image">
                                <div class="media-body comments-grid-right">
                                    <h4>John Cena</h4>
                                    <ul class="my-2">
                                        <li class="font-weight-bold">25 Oct 2019

                                        </li>

                                    </ul>
                                    <p>Nullam facilisis diam non magna porta luctus. Aenean facilisis erat posuere erat ornare ultrices. Aliquam ac arcu interdum,Aliquam ac arcu interdum, dapibus nibh convallis, semper augue.</p>
                                    <a href="#comment" class="replay"><span class="fa fa-reply"></span> Reply</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!---728x90--->

                    <!-- <div class="leave-coment-form" id="comment">
                        <h3 class="aside-title">Leave A Comment</h3>
                        <form action="#" method="post">
                            <div class="d-grid- grid-col-2">
                                <div class="form-group">
                                    <input type="text" name="Name" class="form-control" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Name" class="form-control" placeholder="Subject" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Email" class="form-control" placeholder="Email" required="">
                                </div>
                            </div>
                            <div class="form-group">
								<textarea name="Message" class="form-control" placeholder="Your comment here..."
                                          required=""></textarea>
                            </div>
                            <div class="mm_single_submit">
                                <button type="submit" class="btn">Post Comment</button>
                            </div>
                        </form>
                    </div> -->
                </div>
                <!-- left side blog post content -->
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
