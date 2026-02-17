@extends('layouts.backend')

{{-- @section('title', '| Users') --}}

@section('content')
    <section class="content">
        @include('backend.partials.post-success')

        <div class="row">
            <div class="col-md-12">
                <div class="h4_w_btns_holder">
                    <h4 class="h4_w_btns"><i class="fa fa-users"></i> User Management


                        {{-- @canany(['RoleSysAdmin', 'SysAdminViewPermissions']) --}}
                        {{-- One of these is a role permission to decide who accesses, the other is if a package can access it, --}}
                        {{-- so do we need to use an and operation ?? --}}
                        @canany(['RoleDevMode'])
                            <a class="btn btn-sm btn-flat bg-info float-right" href="{{ route('permissions.index') }}">
                                <i class="fa fa-key"></i> Permissions
                            </a>
                        @endcan

                        @canany(['RoleSuperAdmin'])
                            <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{ route('roles.index') }}">
                                <i class="fa fa-key"></i> Roles
                            </a>
                        @endcan

                        @canany(['RoleSuperAdmin'])
                            <a class="btn btn-sm btn-flat bg-green float-right mr-1" href="{{ route('users.create') }}">
                                <i class="fa fa-plus-circle"></i> Add User
                            </a>

                        @endcan

                    </h4>
                </div>
                @if (count($users) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="main_grid">

                            <thead>
                                <tr>
                                    <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Email</th>
                                    <th class="col-md-2">Date/Time Added</th>
                                    <th class="col-md-2">User Roles</th>
                                    <th class="col-md-4">Operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="{{ $user->id }}">

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>

                                        {{-- Retrieve array of roles associated to a user and convert to string --}}
                                        <td>
                                            @if ($user->roles()->count() > 0)
                                                @foreach ($user->roles()->get() as $role)
                                                    <span
                                                        style="padding:2px 6px; background-color: #1d643b; color: #FFF; margin-left: 0.6em; font-size:0.9em;">
                                                        {{ $role['name'] }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span
                                                    style="padding:2px 6px; background-color: indianred; color: #FFF; margin-left: 0.6em; font-size:0.9em;">
                                                    Not set
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Edit and delete operations are just for system admins here -->
                                        <td>
                                            {{-- @canany(['SysAdminEditUser', 'RoleSysAdmin']) --}}

                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm btn-flat bg-green" style="margin-right: 3px;">Edit / View
                                                / Add to Role</a>
                                            {{-- @endcan --}}

                                            {{-- @canany(['SysAdminDeleteUser', 'RoleSysAdmin']) --}}

                                            @if (!in_array(
                                                'Super Admin',
                                                $user->roles()->pluck('name')->toArray(),
                                            ) &&
                                                !in_array(
                                                    'Developer',
                                                    $user->roles()->pluck('name')->toArray(),
                                                ))
                                                <button class="btn btn-sm btn-flat bg-red float-right btn_delete_resource"
                                                    data-toggle="modal" data-target="#delete_resource"
                                                    data-uid="{{ $user->id }}">
                                                    Delete
                                                </button>
                                            @endif

                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @else
                    <h5> There are no users yet ... Add one from the top right.</h5>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $users->links() }}
            </div>
        </div>
    </section>

    @include('backend.modals.delete-user')
    <div class="clearfix"></div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            /**
             *  DELETE RESOURCE
             *
             */
            $(document).on("click", ".btn_delete_resource", function() {
                $('.ajax_status span').empty().removeClass('text-danger', 'text-success');
                var resource_uid = $(this).data('uid');

                $(".modal-body #resource_uid").val(resource_uid);
            });

            $(document).on('click', '#delete_resource_yes', function() {
                $('.ajax_status i').css({
                    'display': 'inline'
                });

                resource_uid = $('#resource_uid').val();
                $.ajax({
                        url: '{!! route('userDelete') !!}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': " {{ csrf_token() }}"
                        },
                        data: {
                            resource_uid: resource_uid
                        }
                    })
                    .done(function(response) {

                        response = JSON.parse(response);

                        // $('.modal_cancel').text('Close');
                        if (response.status == 1) {
                            // Remove the row from the table
                            $('#main_grid').find('tr#' + resource_uid).remove();

                        }
                        /*else {
                                                        $('.ajax_status span').text(response.message).addClass('text-danger');
                                                    }*/

                        $('#delete_resource').modal('hide');
                    }) //end done

                    .fail(function(xhr) {

                    }); //end fail
            }); // End delete resource
        });
    </script>
@endpush
