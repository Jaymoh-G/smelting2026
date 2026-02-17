<!-- Headers-4 block -->
<section class="w3l-header-4">
    <header id="headers4-block">
        <div class="wrapper">
            <div class="d-grid nav-mobile-block header-align">
                <div class="logo" style="border: 1px solid re">
{{--                    <a class="brand-logo" href="index.html"><span class="fa fa-ravelry"></span> Agreeing</a>--}}
                    <!-- if logo is image enable this -->
                    <a href="{{route('home')}}" class="float-left"><img src="{{asset('images/logo.png')}}" alt="Logo" title="Logo" style="height:90px;" />
                    </a>
                    <a class="brand-logo float-right mt-4" href="{{route('home')}}">
                        <span style="display: block">SMELTING AFRIKA</span>
                         <span style="display: block">CONSULTANTS</span>
                    </a>
                </div>
                <input type="checkbox" id="nav" />
                <label class="nav" for="nav"></label>
                <nav>
                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop">
                    <ul class="menu">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('front_about')}}">About Us</a></li>
                        {{--<li>
                            <!-- sumenu Drop Down -->
                            <label for="drop-3" class="toggle toogle-3">Areas of Focus <span class="angle-dropdown"
                                                                                    aria-hidden="true"></span>
                            </label>
                            <a href="{{route('areas_of_focus')}}">Areas of Focus <span class="angle-dropdown" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-3">

                            <ul>
                                <li><a href="{{route('home')}}" class="drop-text">Corporate Training on
                                        management</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Pricing</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Single Page</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Team Single</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Portfolio</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Search Results</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Timeline</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Faq</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">404</a></li>
                                <li><a href="{{route('home')}}" class="drop-text">Coming soon</a></li>
                            </ul>
                        </li>--}}
                        <li><a href="{{route('front_areas_of_focus')}}">Areas of Focus</a></li>
                        <li><a href="{{route('front_events')}}">Events & Trainings</a></li>
                        {{-- <li><a href="{{route('front_csr')}}">CSR</a></li> --}}
                        <li><a href="{{route('front_blog')}}">Blog</a></li>
                        <li><a href="{{route('front_contact')}}">Contact</a></li>

                        {{--<li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-4" class="toggle toogle-4">Blog <span class="angle-dropdown"
                                                                                   aria-hidden="true"></span>
                            </label>
                            <a href="#blog">Blog <span class="angle-dropdown" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-4">

                            <ul>
                                <li><a href="blog.html" class="drop-text">Blog</a></li>
                                <li><a href="blog-single.html" class="drop-text">Blog Single</a></li>
                            </ul>
                        </li>--}}
                    </ul>
                </nav>
                {{--<div class="button">
                    <a class="actionbg" title="login now" href="login.html">Login</a>
                </div>--}}
            </div>
        </div>
    </header>
    <script src="{{asset('js/common/jquery-3.6.0.min.js')}}"></script>

    <script>
        $('#drop').change(function () {
            if ($('#drop').is(":checked")) {
                $('body').css('overflow', 'hidden');
            } else {
                $('body').css('overflow', 'auto');
            }
        });
    </script>
</section>
<!-- Headers-4 block -->
