@extends('layouts.backend')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/basic.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/backend/dropzone/dropzone.css')}}">
@endpush

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-success" href="{{route('team_member_create')}}">Create New Member</a>

            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($team_members) > 0)
                        <div class="row" style="margin-top: 1em; border-top: 1px solid #C6C6C6;" id="update_product_images_row">
                            <div class="col-md-10 col-md-offset-1">

                                <div class="row" style="border: 1px solid blu">
                                    @foreach($team_members as $index => $team_member)
                                        <div class="col-md-4 image_container" style="border: 1px solid re">

                                            <div class="image_ops_icons_holder" style="border: 1px solid re; width: 100%">
                                                {{--                                    <p style="cursor: pointer" class="delete_team_member_icon">Delete  <span style="cursor: pointer; text-align: left" class="fa fa-times-circle-o text-danger " data-toggle="modal" data-uid="{{$team_member->id}}" data-name="{{$team_member->name}}" data-logo="{{$team_member->logo}}" data-target="#delete_team_member" title="Delete Team Member"></span></p>--}}
                                                &nbsp; &nbsp; &nbsp; &nbsp;
                                                <a style="text-align: right" href="{{route('team_member_edit', ['id' => $team_member->id])}}">
                                                    <span style="position: relative;">Edit</span>
                                                    <i class="fa fa-eye text-success "></i>
                                                </a>
                                            </div>
                                            <img data-u="image" src="{{asset('images/team_images/'.$team_member->image)}}" alt="{{$team_member->name}}" width="200px"/>

                                            <p>Name : {{$team_member->name}}</p>
                                            <p>Title : {{$team_member->title}}</p>
                                            <p>LinkedIn : {{$team_member->linkedin}}</p>

                                        </div>
                                        @if(($index+1) % 3 == 0)
                                </div>
                                <div class="row" style="margin-top: 1em; padding-top: 1em;">
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br/>
                    @else
                        <div class="text-center">
                            <h4 class="text-center text-uppercase smallerh4"> There are no Team Members yet </h4>
                            <a href="{{route('team_member_create')}}" class="btn btn-success btn-sm">Add one</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
    @include('backend.modals.delete-team_member')

@endsection

@push('scripts')
    <script src="{{asset('js/backend/dropzone/dropzone.js')}}"></script>
    <script>
        $(document).ready(function () {

            /**
             * Handle delete of image
             */
            $(document).on("click", ".delete_team_member_icon", function () {
                $('.ajax_status span').empty().removeClass('text-danger','text-success');

                var resource_uid = $(this).data('uid');
                var team_member_name = $(this).data('name');
                var team_member_logo = $(this).data('logo');

                $(".modal-body #resource_uid").val( resource_uid );
                $(".modal-body #team_member_name").val( team_member_name );
                $(".modal-body #team_member_logo").val( team_member_logo );

            });

            $(document).on("click", "#delete_team_member_yes", function(e) {
                $('.ajax_status i').css({'display':'inline'});
                // $('.ajax_status span').empty();
                // console.log("Send Ajax request to delete the category: ", $('#cat_uid').val());
                resource_uid  = $('#resource_uid').val();
                team_member_name = $('#team_member_name').val();
                team_member_logo = $('#team_member_logo').val();

                $.ajax({
                    url: '{!! route("team_member_delete") !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': " {{csrf_token()}}"
                    },
                    data: {
                        resource_uid:resource_uid, team_member_name:team_member_name, team_member_logo:team_member_logo
                    }
                })
                    .done(function (response) {

                        response = JSON.parse(response);
                        $('.ajax_status i').css({'display':'none'});

                        // $('.modal_cancel').text('Close');
                        if(response.status == 1){
                            $('.ajax_status span').text(response.message).addClass('text-success');
                        }else {
                            $('.ajax_status span').text(response.message).addClass('text-danger');
                        }

                        // Close modal
                        $('#delete_team_member').modal('hide');

                        window.location = "{!! route('admin_team_members') !!}";


                    })//end done

                    .fail(function (xhr) {

                    }); //end fail
            }); //end delete image
        }); //End doc ready
    </script>
@endpush
