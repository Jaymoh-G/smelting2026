@extends('layouts.backend')

@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="row" style="">
                <div class="col-8">
                    @if (Session::has('success'))
                        <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('failure'))
                        <div class="alert alert-micro alert-border-left alert-danger pastel alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i>
                            {{ Session::get('failure') }}
                        </div>
                    @endif
                    <form action="{{route('generateCertificates')}}" method="POST">
                        <p style="color:red">[This functionality is under test mode. Do not use it for real events.]</p>
                        @csrf
                        <input type="hidden" name="event_id" value="{{$event_id}}">
                        {{-- <label for="co_trainer">Name of Co-Trainer</label>
                        <input type="text" class="form-control mb-5" name="co_trainer" id="co_trainer" required> --}}
                        <label for="description">A description of the event</label>
                        <textarea id="description" class="form-control mb-3" name="description" rows="7" required></textarea>
                        <button type="submit" class="btn btn-sm btn-success">Generate Certificates</button>
                    </form>
                </div>
            <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {


        }); // end doc ready
    </script>
@endpush

