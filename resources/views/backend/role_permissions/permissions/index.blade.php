@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('flash_message'))
                    <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info pr10"></i>
                        {!! session('flash_message') !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="h4_w_btns_holder">
                    <h4 class="h4_w_btns">
                        <i class="fa fa-key"></i> Permissions Management

                        @can('RoleDevMode')
                        <a class="btn btn-sm btn-flat bg-green float-right" href="{{route('permissions.create')}}">
                            <i class="fa fa-plus-circle"></i> Add Permision
                        </a>
                        @endcan

                        <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('users_index')}}">
                            <i class="fa fa-user"></i> Users
                        </a>
                        <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('roles.index')}}">
                            <i class="fa fa-key"></i> Roles
                        </a>
                    </h4>
                </div>
                @if(count($permissions) > 0)
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="main_grid">

                        <thead>
                        <tr>
                            <th class="col-md-3">Permission</th>
                            <th class="col-md-7">Description</th>
                            <th class="col-md-2">Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr id="{{$permission->id}}">

                            <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>

                                {{--<td>
                                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-flat bg-blue pull-left" style="margin-right: 3px;">Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-flat bg-red']) !!}
                                    {!! Form::close() !!}

                                </td>--}}
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn bg-light-blue-gradient pull-left btn-sm btn-flat" style="margin-right: 3px;">Edit / View</a>
                                    @can('RoleDevMode')
                                        <button class="btn btn-flat btn-sm bg-red-gradient pull-right btn_delete_resource" data-toggle="modal"  data-target="#delete_resource" data-uid="{{$permission->id}}">
                                            Delete
                                        </button>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <h5> There are no permissions yet ... Add one from the top right.</h5>
                @endif

            </div>
        </div>
    </section>
    @include('backend.modals.delete-permission')
    <div class="clearfix"></div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            /**
             *  DELETE RESOURCE
             *
             */
            $(document).on("click", ".btn_delete_resource", function () {
                $('.ajax_status span').empty().removeClass('text-danger','text-success');
                var resource_uid = $(this).data('uid');

                $(".modal-body #resource_uid").val( resource_uid );
            });

            $(document).on('click','#delete_resource_yes', function(){
                $('.ajax_status i').css({'display':'inline'});

                resource_uid = $('#resource_uid').val();
                $.ajax({
                    url: '{!! route("permissionDelete") !!}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': " {{csrf_token()}}"
                    },
                    data: {
                        resource_uid:resource_uid
                    }
                })
                    .done(function (response) {
                        console.log("Type of response");
                        console.log(typeof response);

                        response = JSON.parse(response);

                        // $('.modal_cancel').text('Close');
                        if(response.status == 1){
                            // Remove the row from the table
                            $('#main_grid').find('tr#'+resource_uid).remove();

                        }/*else {
                                $('.ajax_status span').text(response.message).addClass('text-danger');
                            }*/

                        $('#delete_resource').modal('hide');
                    })//end done

                    .fail(function (xhr) {

                    }); //end fail
            }); // End delete resource
        });
    </script>
@endpush


