<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        .parent_div{
            height: 35em;
            border: 1px solid #60471C;
            background-color: #FFFFEE;
            padding-left: 0 !important;
            position: relative;
        }

        .parent_div .row{

            padding-left: 0 !important;
            margin-left: 0 !important;
        }

        #triangle-topleft {
            position: absolute;
            width: 0;
            height: 0;
            border-top: 100px solid #FCCC0B;
            border-right: 100px solid transparent;
        }

        #triangle-topright {
            position: absolute;
            right: 0;
            width: 0;
            height: 0;
            border-top: 100px solid #FCCC0B;
            border-left: 100px solid transparent;
        }

        #triangle-bottomleft {
            position: absolute;
            bottom: 0;
            width: 0;
            height: 0;
            border-bottom: 100px solid #FCCC0B;
            border-right: 100px solid transparent;
        }


        #triangle-bottomright {
            position: absolute;
            width: 0;
            height: 0;
            border-bottom: 100px solid #FCCC0B;
            border-left: 100px solid transparent;
            bottom: 0;
            right: 0;
        }

    </style>
    <link href="{!! asset('css/common/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div class="container parent_div pb-5">
    <div id="triangle-topleft"></div>
    <div id="triangle-topright"></div>

    <div class="row ">
        <div class="col-10 text-center pt-5 offset-1">

            <h2>CERTIFICATE OF PARTICIPATION</h2>
            <h5>Awarded to</h5>
            <h2>ERIC KABURU</h2>
            <h6>of</h6>
            <h2>UJUZI KILIMO SOLUTIONS</h2>

            <p class="mb-3">
                Description. Description. Description. Description. Description. Description.
                Description. Description. Description. Description. Description. Description.
                Description. Description. Description. Description. Description. Description.
            </p>

            <div class="row mb-5">
                <div class="col-2 mt-5">
                    <img src="{{asset('images/siyb_png.png')}}" class="mt-3" alt="SIYB" title="Logo" style="width:90px;" />
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"
                        style="
                            background-color: #FFFFEE !important;
                            border-bottom: 4px solid #60471C;
                            border-top: 0;
                            border-left: 0;
                            border-right: 0;
                        ">
                    <p>STACEY MARITIM</p>
                    <p>Co-Trainer</p>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"
                       style="background-color: #FFFFEE !important;
                       border-bottom: 4px solid #60471C;
                       border-top: 0;
                       border-left: 0;
                       border-right: 0;

                        ">
                    <p>ALFRED WARUI KIMANI</p>
                    <p>Lead Trainer</p>
                </div>
                <div class="col-2 mt-5">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" title="Logo" style="width:85px;" />
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <p>NITA registration Number</p>
                    <p>NITA/TRN/1814</p>
                </div>
            </div>

        </div>
        <div id="triangle-bottomleft"></div>
        <div id="triangle-bottomright"></div>
    </div>
</div> <!-- End parent div -->
</body>
</html>
