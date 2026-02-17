@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <section class="content">
        <div class="row actions_row btn_breadcumbs">
            <div class="col-md-12">
                <a class="btn btn-sm btn-flat bg-orange" href="{{route('dashboard')}}">
                    <i class="fa fa-backward"></i> Dashboard
                </a>

                <a class="btn btn-sm btn-flat bg-blue float-right" href="{{route('users_index')}}">
                    <i class="fa fa-user"></i> Users
                </a>

                <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('roles.index')}}">
                    <i class="fa fa-key"></i> Roles
                </a>

                @canany(['RoleDevMode'])
                    <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('permissions.index')}}">
                        <i class="fa fa-key"></i> Permissions
                    </a>
                @endcan
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('backend.role_permissions.roles.notifs.after_role_create')
            </div>
        </div>
        <div class="row">
            <div class='col-md-12'>
                @include('backend.partials.form-errors')
                {{ Form::open(array('route' => ['roles.store'])) }}

                <br>
                <h4><i class='fa fa-key'></i> Add Role</h4>
                <br>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('name', 'Name of the role') }}
{{--                            Second parameter below is the placeholder--}}
                            {{ Form::text('name', '', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div>
                    @if(count($permissions) > 0)
                        <label>Assign Permissions</label>
                        <br>
                        <div class='form-group'>
                            @foreach ($permissions as $permission)
                                {{--{{ Form::checkbox('permissions[]',  $permission->id ) }}
                                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>--}}
                                <label style="margin-right: 1.6em; cursor: pointer">
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                    >
                                    {{ucfirst($permission->name)}}
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

{{--                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}--}}
                <button type="submit" class="btn btn-sm btn-flat bg-green btn_min_width">
                    Add &nbsp;  &nbsp; <i class="fa fa-plus-circle"></i>
                </button>

                {{ Form::close() }}

            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@endsection
