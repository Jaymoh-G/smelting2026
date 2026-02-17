@extends('layouts.backend')

@push('styles')
    {{--    <link href="{{ asset('css') }}" rel="stylesheet"  />--}}

    <style>

    </style>
@endpush
@section('content')
    <div class="content">
        {{-- <div class="row ml-2 mb-2">
            <a href="{{route('create_event')}}" class="btn btn-flat btn-small btn-success">Create a new event</a>
        </div> --}}
        <div class="container-fluid">
            <div class="row">
                @foreach($resources as $resource)
                <div class="col-lg-4 col-6">
                    <p>{{$resource->title}}</p>
                   <a href="{{route('edit_event', ['id' => $resource->id])}}">
                       <img src="{{asset('images/event_images/'.$resource->image_url)}}" alt="Event Image" class="img-fluid">
                   </a>
                    <p>From: {{date("jS F Y", strtotime($resource->start_date))}}</p>
                    <p>To: {{date("jS F Y", strtotime($resource->end_date))}} </p>
                    {{-- <img src="{{$resource->image_url}}" alt="Blog Image" class="img-fluid"> --}}
                    <a href="{{route('event_view_regs', ['id' => $resource->id])}}" class="btn btn-sm btn-info">View Registrations </a> &nbsp;&nbsp;&nbsp;
                    <a href="{{route('issueCertificatesIndex', ['id' => $resource->id])}}" class="btn btn-sm btn-info">Issue Certificates </a> &nbsp;&nbsp;&nbsp;

                </div>
                @endforeach
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- {{ $resources->links() }} -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {


        }); // end doc ready
    </script>
@endpush
