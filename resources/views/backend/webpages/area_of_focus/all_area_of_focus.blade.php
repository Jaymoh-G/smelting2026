@extends('layouts.backend')

@push('styles')
    {{--    <link href="{{ asset('css') }}" rel="stylesheet"  />--}}

    <style>

    </style>
@endpush
@section('content')
    <div class="content">
        <div class="row ml-2 mb-2">
            <a href="{{route('create_area_of_focus')}}" class="btn btn-flat btn-small btn-success">Create a new area of focus</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($resources as $resource)
                <div class="col-lg-4 col-6">
                    <p>{{$resource->title}}</p>
                   <a href="{{route('edit_area_of_focus', ['id' => $resource->id])}}">
                       <img src="{{asset('images/area_of_focus/'.$resource->image_url)}}" alt="Image" class="img-fluid">
                   </a>
                    <p>{{$resource->date_published}}</p>

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
