@extends('layouts.frontend')
<?php
use Illuminate\Support\Facades\Request;
?>
@push('styles')
    {{-- <link href="{{ asset('css/frontend/meet-team.css') }}" rel="stylesheet"  /> --}}

    {{-- /var/www/html/smelting/adminlte/plugins/bootstrap/js/bootstrap.js --}}
    <style>
        /*! CSS Used from: https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/asset/css/bootstrap.min.css?ver=1.1 ; media=all */
        @media all{
            *,::after,::before{box-sizing:border-box;}
            h4,h5{margin-top:0;margin-bottom:.5rem;}
            p{margin-top:0;margin-bottom:1rem;}
            a{color:#007bff;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects;}
            a:hover{color:#0056b3;text-decoration:underline;}
            img{vertical-align:middle;border-style:none;}
            h4,h5{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit;}
            h4{font-size:1.5rem;}
            h5{font-size:1.25rem;}
            .col-md-3{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;}
            @media (min-width:768px){
                .col-md-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%;}
            }
            @media print{
                *,::after,::before{text-shadow:none!important;box-shadow:none!important;}
                a:not(.btn){text-decoration:underline;}
                img{page-break-inside:avoid;}
                p{orphans:3;widows:3;}
            }
        }
        /*! CSS Used from: https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/asset/css/style.min.css?ver=1.1 ; media=all */
        @media all{
            /*! @import https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/asset/css/reset.css */
            div,h4,h5,p{margin:0;padding:0;}
            img{border:0;}
            h4,h5{font-size:100%;font-weight:normal;}
            /*! end @import */
        }
        /*! CSS Used from: https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/asset/css/elements.css?ver=1.1 ; media=all */
        @media all{
            .ti-linkedin{*zoom:expression(this.runtimeStyle['zoom'] = '1', this.innerHTML = '&#xe735;');}
            [class^="ti-"]{font-family:'themify';speak:none;font-style:normal;font-weight:normal;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
            .ti-linkedin:before{content:"\e735";}
        }
        /*! CSS Used from: https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/style.css?ver=5.4.8 ; media=all */
        @media all{
            h4,h5{margin:0;font-weight:700;font-family:'Open Sans','Maiandara','Quicksand','Montserrat', sans-serif;color:#000;}
            h4{font-size:20px;line-height:30px;}
            a{font-family:'Open Sans','Maiandara','Quicksand','Montserrat', sans-serif;color:#3a4368;}
            p{font-family:'Open Sans','Maiandara', 'Quicksand','Montserrat', sans-serif;color:#000;padding:5px 0;text-align:justify;}
            a:focus,a:hover{text-decoration:none;}
            img{max-width:100%;height:auto;width:100%;}
            .social-links{display:inline-block;line-height:40px;}
            .social-links a{text-decoration:none;}
            .social-links span{background:transparent;text-align:center;line-height:40px;color:#fff;background:#e82429;border:1px solid #e82429;border-radius:50%;-webkit-transition:.3s;transition:.3s;margin-right:0px;font-size:14px;padding:12px;margin-left:18px;}
            .social-links span:hover{color:#e82429;background:#ffffff;border-color:#ffffff;}
            .team-carosule-single-item{position:relative;border-radius:5px;-webkit-transition:.3s;transition:.3s;overflow:hidden;border:1px solid #58595B;min-height:400px;max-height:400px;margin:15px 0;}
            .team-overlay{position:absolute;left:0;right:0;bottom:0;width:100%;height:100%;padding:54px 10px;text-align:center;z-index:1;-webkit-transition:.5s ease;transition:.5s ease;overflow:hidden;opacity:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";visibility:hidden;}
            .team-overlay p.meta-p{margin-top:0;font-size:14px;color:#000;font-weight:600;text-align:center;}
            .team-carosule-single-item:hover .team-overlay{opacity:1;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";visibility:visible;}
            .team-meta{position:absolute;bottom:0;text-align:center;background:#fff;width:100%;left:0;border-radius:0px 0px 5px 5px;padding:25px 25px 10px 25px;right:0;height:115px;}
            .team-meta h4{font-size:18px;font-weight:700;color:#000;margin-bottom:0;margin-top:0;}
            .team-meta p{font-size:14px;color:#000;font-weight:500;line-height:16px;text-align:center;}
            .team-overlay:after{position:absolute;top:0;left:0;width:100%;height:100%;background:#fff;content:"";opacity:.8;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";z-index:-1;}
            .team-social-links{position:absolute;left:0;bottom:10px;background:#fff;width:100%;}
            .team-social-links .social-links{margin:0;padding-top:13px;padding-bottom:27px;}
            .team-social-links .social-links span{background:#ffffff;text-align:center;line-height:30px;color:#e82429;border:1px solid#e82429;border-radius:50%;-webkit-transition:.3s;transition:.3s;margin-right:10px;font-size:14px;padding:6px;margin-left:0;}
            .team-social-links .social-links span:hover{background:#e82429;color:#ffffff;border:1px solid#e82429;}
            .team-overlay h5{font-size:18px;font-weight:700;margin:0 0 5px;color:#000;text-align:center;}
            .team-overlay p{font-size:14px;color:#000;line-height:24px;margin-top:20px;}
        }
        /*! CSS Used from: https://www.ashitivaadvocates.com/wp-content/themes/ashitiva/asset/css/responsive/responsive.css?ver=1.1 ; media=all */
        @media all{
            @media (min-width: 1170px) and (max-width: 1366px){
                .team-social-links{left:60px;}
            }
            @media only screen and (min-width: 992px) and (max-width: 1200px){
                .team-social-links{left:40px;}
            }
            @media only screen and (min-width: 768px) and (max-width: 991px){
                .team-social-links{left:60px;}
            }
            @media only screen and (max-width: 767px){
                .team-social-links{left:48px;}
            }
            @media only screen and (min-width: 480px) and (max-width: 767px){
                .team-social-links{left:30px;}
            }
        }

        /*-------------------------------------------------------------------------*/
        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            /*background-color:*/
            justify-content: center;
        }

        .flex-container {
            /*justify-content:space-between;*/
        }

        .flex-container > div {
            background-color: #FFF;
            width: 250px;
            margin: 50px;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
        }

        .container {
            display: flex; /* or inline-flex */
        }

        .member-hover {
            position: absolute;
            top: -100px;
            left: -20px;
            background-color: #007BFF;
            width: 250px;
            padding: 10 10 10 10;
            display: none;
            transition: 2s;
            /* height: 150px; */
        }

        .team-member-parent{
            position: relative;
            transition: 0.3s;
        }

        .team-member-image{
            cursor: pointer;
        }

        .member-hover p{
            font-size: 0.5em !important;
        }


        .tooltip-inner {
            max-width: 350px;
            /* If max-width does not work, try using width instead */
            width: 350px;
            /* background-color: #FFD634; */
            background-color: #007BFF;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .tooltip.top .tooltip-arrow{
            bottom:0;
            left:50%;
            margin-left:-5px;
            border-left:5px solid transparent;
            border-right:5px solid transparent;
            border-top:5px solid #007BFF
        }
        .tooltip.left .tooltip-arrow{
            top:50%;
            right:0;
            margin-top:-5px;
            border-top:5px solid transparent;
            border-bottom:5px solid transparent;
            border-left:5px solid #007BFF
        }
        .tooltip.bottom .tooltip-arrow{
            top:0;
            left:50%;
            margin-left:-5px;
            border-left:5px solid transparent;
            border-right:5px solid transparent;
            border-bottom:5px solid #007BFF
        }
        .tooltip.right .tooltip-arrow{
            top:50%;
            left:0;
            margin-top:-5px;
            border-top:5px solid transparent;
            border-bottom:5px solid transparent;
            border-right:5px solid #007BFF
        }
    </style>


@endpush
@section('content')
    <!-- Headers-4 block -->
    <!-- inner banner -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner about-inner-about">
            <div class="wrapper">

                <ul class="breadcrumbs-custom-path">
                    <h1 class="text-uppercase">About Us</h1>

                </ul>
            </div>
        </div>
    </section>
    <!-- //covers -->
    <div class="wrapper">
        <section class="w3l-content-1">

        </section>

        <div class="row mt-5">
            <div class="col-md-12">
                <p class="mb-5 mt-5">
                    {!! $about_content->intro !!}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center mt-2 mb-2">Our Core Business</h4>
                <p class="mb-5"> {!! $about_content->core_business !!}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <h4 class="text-center mb-2">
                    Who do we work with ?
                </h4>
                <p>
                    {!! $about_content->who_we_work_with !!}
                </p>

            </div>
        </div>
    </div>



    <!-- teams-32-main -->
    <section class="w3l-teams-32-main">
        <div class="teams-32">
            <div class="wrapper">
                <div class="section-title align-center text-center">
                    <h3>MEET OUR TEAM </h3>
                    <p class="sub-paragraph"></p>
                </div>
                <div class="flex-container team-wrapper d-flex flex-sm-row flex-column">
                    @foreach($team_members as $index => $team_member)
                        <div class="team-member-parent">
                            <a href="#">
                            </a>
                            <div class="team-carosule-single-item">
                                <a href="#">
                                    <img src="{{asset('images/team_images/'.$team_member->image)}}" alt="team member">
                                    <div class="team-meta">
                                        <h4>{{$team_member->name}}</h4>
                                        <p>{{$team_member->title}}</p>
                                    </div>
                                </a>
                                <div class="team-overlay">
                                    <a href="#">
                                        <h5>{{$team_member->name}}</h5>
                                        <p class="meta-p">{{$team_member->title}}</p>
                                    </a>
                                    <div class="team-social-links">
                                        <a href="#">
                                        </a>
                                        <div class="social-links"><a href="#">
                                            </a><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div> <!--// Team overlay -->
                            </div> <!--// Team carousel -->
                        </div> <!--// Team member parent -->
                        @if(($index+1) % 3 == 0)
                </div>
                <div class="flex-container team-wrapper d-flex flex-sm-row flex-column">
                    @endif
                    @endforeach
                </div>
                <!--// Flex Container -->
            </div> <!--// Wrapper -->
        </div>
    </section>

    <!-- teams-32-main -->

@endsection

@push('scripts')
    <script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ URL::asset('js/common/bootstrap.bundle.min.js') }}" ></script>
    {{-- <script src="{{ URL::asset('js/common/popper.min.js') }}" ></script> --}}
    {{-- <script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.js') }}" ></script> --}}
    {{-- /var/www/html/smelting/adminlte/plugins/bootstrap/js/bootstrap.js --}}

    <script>
        $(document).ready(function () {
            /* $('.team-member-image').on('hover', function(e){
                // Show the hidden div
                e.preventDefault();
                console.log("hovered");
                $(this).siblings('.member-hover').css({"display":"block"});

            }); */

            $(".team-member-image").hover(function(){
                $(this).siblings('.member-hover').css({"display":"block"});
                // $(this).siblings('.member-hover').slideDown("slow");
                console.log("Hover In");
                }, function(){
                    $(this).siblings('.member-hover').css({"display":"none"});
                    console.log("Hover Out");
                    // $(this).siblings('.member-hover').slideUp("slow");
            });

            /* $(".team-member-image").hover(function(){
                $(this).siblings(".member-hover").slideToggle("slow");
            }); */

            /* $(".team-member-image").on("click", function(){
                $(this).siblings('.member-hover').css({"display":"block"});
                // $(this).siblings('.member-hover').slideDown("slow");
                console.log("Hover In");
                }, function(){
                    $(this).siblings('.member-hover').css({"display":"none"});
                    console.log("Hover Out");
                    // $(this).siblings('.member-hover').slideUp("slow");
            });
 */

            $('.tooltip-demo.well').tooltip({
                selector: "a[rel=tooltip]"
            });

            $('[data-toggle="tooltip"]').tooltip();

            //

        }); // end doc ready
    </script>
@endpush
<script>
    /* import Button from "../../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button";
    export default {
        components: {Button}
    } */
</script>
