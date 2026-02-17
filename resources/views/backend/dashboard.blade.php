@extends('layouts.backend')

@push('styles')
    {{--    <link href="{{ asset('css') }}" rel="stylesheet"  />--}}

    <style>

    </style>
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$events}}</h3>

                            <p>Events Completed</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$num_subscribers}}</h3>

                            <p>Trainees Trained</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Sample Statistic</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Sample Statistic</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {


        }); // end doc ready
    </script>
@endpush
