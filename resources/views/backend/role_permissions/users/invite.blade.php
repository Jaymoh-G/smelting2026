@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <section class="content">
        <div class="row actions_row btn_breadcumbs">
            <div class="col-md-12">
                <a class="btn btn-sm btn-flat bg-orange" href="{{route('admin_index')}}">
                    <i class="fa fa-backward"></i> Dashboard
                </a>

                <a class="btn btn-sm btn-flat bg-blue" href="{{route('users_index')}}">
                    <i class="fa fa-user"></i> Users
                </a>

                @canany(['RoleDevMode'])
                    <a class="btn btn-sm btn-flat bg-blue" href="{{route('roles.index')}}">
                        <i class="fa fa-key"></i> Roles
                    </a>

                    <a class="btn btn-sm btn-flat bg-blue" href="{{route('permissions.index')}}">
                        <i class="fa fa-key"></i> Permissions
                    </a>
                @endcan

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @include('admin.sys_admin.users.notifs.after_user_invite')

                <br>
                <h4><i class='fa fa-user'></i> Invite a user to your organization</h4>
                <br>
                <form action="{{ route('invite.process') }}" method="post">
                    {{ csrf_field() }}
                    <label for="email" >Name</label>
                    <input type="name" name="name" id="name" class="form-control" required/>
                    <br>
                    <label for="email" >Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required/>
                    <br>
                    <button type="submit" class="btn btn-sm bg-green">Send invite</button>
                </form>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@endsection
