@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <div class="row actions_row">
        <div class="col-md-12">
            {{--<a class="btn btn-sm btn-flat bg-orange" href="{{route('admin_index')}}">
                <i class="fa fa-backward"></i> Dashboard
            </a>--}}


        </div>
    </div>

    <section class="content">
        @include('backend.partials.post-success')

        <div class="row">
            <div class="col-md-12">
                <div class="h4_w_btns_holder">
                    <h4 class="h4_w_btns">
                        <i class="fa fa-key"></i> Roles Management

                        @canany(['RoleSuperAdmin', 'RoleSuperAdmin'])
                        <a href="{{ route('roles.create') }}" class="btn btn-flat btn-success btn-sm float-right  no_rad">
                            Add Role <i class="fa fa-plus-circle"></i>
                        </a>
                        @endcan

                        @canany(['RoleSuperAdmin', 'RoleSuperAdmin'])
                        <a href="{{ route('users_index') }}" class="btn btn-sm btn-flat bg-blue float-right mr-1">
                            <i class="fa fa-user"></i> Users
                        </a>
                        @endcan

                        @canany(['RoleDevMode'])
                            <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('permissions.index')}}">
                                <i class="fa fa-key"></i> Permissions
                            </a>
                        @endcan
                    </h4>
                </div>
                @if(count($roles) > 0)
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="main_grid">
                        <thead>
                        <tr>
                            <th class="col-md-2">Role</th>
                            <th class="col-md-3">Description</th>
                            <th  class="col-md-3">Permissions</th>
                            <th  class="col-md-2">Operation</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($roles as $role)
                            <tr id="{{$role->id}}">

                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>

                                {{-- Retrieve array of permissions associated to a role and convert to string --}}
                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn bg-light-blue-gradient pull-left btn-sm btn-flat" style="margin-right: 3px;">Edit / View</a>
                                    @if($role->name != 'Super Admin' && $role->name != 'Subscriber' && $role->name != 'Developer' && $role->name != 'Organization User')
                                        <button class="btn btn-flat btn-sm bg-red-gradient pull-right btn_delete_resource" data-toggle="modal"  data-target="#delete_resource" data-uid="{{$role->id}}">
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                @else
                    <h5> There are no roles yet ... Add one from the top right.</h5>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $roles->links() }}
            </div>
        </div>
    </section>

    @include('backend.modals.delete-role')

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
                    url: '{!! route("roleDelete") !!}',
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

