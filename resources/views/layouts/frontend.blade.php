<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TC2L9NB3');</script>
    <!-- End Google Tag Manager -->
    <title>
        {{ config('app.name', '') }} - 
        {{ $page_title ?? '' }}
    </title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="We are a business consultant aimed at steering business growth and development through capacity building. We offer business development services on how to Start and Improve your business.">
    <meta name="keywords"  content="Smelting Afrika, Smelting Afrika Consultants, NCA trainings, Affordable NCA training in Kenya, Business Consultants, Start and Improve your Business, ILO program, how to start a business, business planning,  business consultants in Kenya, top consulting firms in Kenya." />
    <meta name="facebook-domain-verification" content="fawqnlk7757f743e01w1gnbbyppny6" />
    <meta name="google-site-verification" content="YsrK1xC4mQaADsjPXWMc5F26yihz9GaTILfgiPQeAHM" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//tags -->

    <!-- CSS -->
    {{--	<link href="{!! asset('css/front/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />--}}
    <link href="{!! asset('css/common/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! asset('css/frontend/template-styles.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! asset('css/frontend/custom-styles.css') !!}" rel="stylesheet" type="text/css" media="all" />
    <link href="{!! asset('css/common/fontawesome-5/css/all.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/common/fontawesome-5/css/brands.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/common/fontawesome-5/css/solid.min.css') !!}" rel="stylesheet">


    <!-- //for bootstrap working -->
    {{--<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
        rel='stylesheet' type='text/css'>--}}

    @stack('styles')
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '254845783462064'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=254845783462064&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TC2L9NB3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- header -->
@include ('frontend.partials.navigation')

@yield('content')

<!-- Universal Scripts -->

<script src="{{asset('js/common/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>
    $(document).ready(function () {


    });
</script>
@include('frontend.partials.footer')
@stack('scripts')
</body>

</html>
