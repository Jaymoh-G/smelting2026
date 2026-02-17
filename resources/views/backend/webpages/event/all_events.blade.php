@extends('layouts.backend')

@push('styles')
    {{--    <link href="{{ asset('css') }}" rel="stylesheet"  />--}}

    <style>

    </style>
@endpush
@section('content')
    <div class="content">
        <div class="row ml-2 mb-2">
            <a href="{{route('create_event')}}" class="btn btn-flat btn-small btn-success">Create a new event</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($resources as $resource)
                <div class="col-lg-4 col-6">
                    <span>{{$resource->title}}</span>
                    <form method="post" action="{{route('delete_event')}}">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="resource_uid"/>
                        <button type="submit" class="mb-2 btn btn-sm btn-danger">Delete</button>
                    </form>
                    
                   <a href="{{route('edit_event', ['id' => $resource->id])}}">
                       <img src="{{asset('images/event_images/'.$resource->image_url)}}" alt="Event Image" class="img-fluid">
                   </a>
                    <p>From: {{date("jS F Y", strtotime($resource->start_date))}}</p>
                    <p>To: {{date("jS F Y", strtotime($resource->end_date))}} </p>
                    {{-- <img src="{{$resource->image_url}}" alt="Blog Image" class="img-fluid"> --}}

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
