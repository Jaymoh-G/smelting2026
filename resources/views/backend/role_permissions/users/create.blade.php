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

                @canany(['RoleSuperAdmin'])
                    <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('roles.index')}}">
                        <i class="fa fa-key"></i> Roles
                    </a>
                @endcan

                @canany(['RoleDevMode'])

                    <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('permissions.index')}}">
                        <i class="fa fa-key"></i> Permissions
                    </a>
                @endcan

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.partials.form-errors')

                <br>
                <h4><i class='fa fa-user'></i> Add User</h4>
                <br>
                {{ Form::open(['route' => ['users.store']])  }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}<br>
                            {{ Form::password('password', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}

                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{ Form::password('password_confirmation', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}

                        </div>

                    </div>

                    <div class="col-md-6" style="padding-top: 1em;">
                        @if(!$roles->isEmpty()) {{-- If some roles exist --}}
                        <label>Pick roles to assign to the user </label>
                        <div class='form-group'>
                            @foreach ($roles as $role)
                              {{--  {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>--}}
                                <label style="margin-right: 1.6em; cursor: pointer">
                                    <input type="checkbox" name="roles[]" value="{{$role->id}}">
                                    {{ucfirst($role->name)}}
                                </label>
                            @endforeach
                        </div>
                        @endif

                    </div>
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
