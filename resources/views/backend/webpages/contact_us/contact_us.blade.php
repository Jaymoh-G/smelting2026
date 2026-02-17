@extends('layouts.backend')

@push('styles')
    {{--<link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet"  />--}}
@endpush

@section('content')

    <section class="content">
        <div>
            <div class="row">
                <div class="col-md-10">
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
                    <form method="post" id="article_details_form" action="{{route('admin_contact_page_save')}}">
                        @csrf
                        <input type="hidden" value="{{$resource->id}}" name="resource_id">
                        <div class="form-group">
                            <label for="telephone">Telephone Numbers. (Comma Separated)</label>
                            <textarea id="telephone" name="telephone" class="form-control">{{$resource->telephone}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Emails . (Comma Separated)</label>
                            <textarea id="email" name="email" class="form-control">{{$resource->email}}</textarea>

                        </div>

                        <div class="form-group">
                            <label for="physical_location">Physcial Location</label>
                            <textarea id="physical_location" name="physical_location" class="form-control mb-2">{{$resource->physical_location}}</textarea>

                            <div class="form-group">
                                <h3>Socials</h3>
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="{{$resource->facebook}}">

                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" value="{{$resource->twitter}}">

                                <label for="linkedin">Linked In</label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$resource->linkedin}}">

                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="{{$resource->instagram}}">

                                <label for="tiktok">Tik Tok</label>
                                <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{$resource->tiktok}}">


                            </div>

                            <button type="submit" class="btn btn-success btn-sm custom_button custom_button_width tiny_mce_submits" id="btn_save_draft"> Save </button>
                            <i class="fa fa-spinner ajax_spinner"></i>
                            <div>
                                <p class="ajax_success_p text-success"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

@endsection


