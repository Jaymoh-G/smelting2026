@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <section class="content">
        <div class="row actions_row btn_breadcumbs">
            <div class="col-md-12">
                <a class="btn btn-sm btn-flat bg-orange" href="{{route('dashboard')}}">
                    <i class="fa fa-backward"></i> Dashboard
                </a>

                <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('users_index')}}">
                    <i class="fa fa-user"></i> Users
                </a>

                <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('roles.index')}}">
                    <i class="fa fa-key"></i> Roles
                </a>

                <a class="btn btn-sm btn-flat bg-blue float-right mr-1" href="{{route('permissions.index')}}">
                    <i class="fa fa-key"></i> Permissions
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('backend.partials.form-errors')

                <br>
                <h4><i class='fa fa-key'></i> Add Permission</h4>
                <br>

                {{ Form::open(array('route' => ['permissions.store'])) }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('name', 'Name of the permission') }}
                            {{ Form::text('name', '', ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}

                        </div>
                    </div>
                </div>

                <br>
                @if(!$roles->isEmpty()) {{-- If some roles exist --}}
                    <label>Assign Permission to Roles</label>
                    <br>
                    @foreach ($roles as $role)
                       {{-- {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>--}}
                        <label style="margin-right: 1.6em; cursor: pointer">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}">
                            {{ucfirst($role->name)}}
                        </label>

                    @endforeach
                @endif
                <br>
{{--                {{ Form::submit('Add', array('class' => 'btn btn-sm btn-flat bg-blue')) }}--}}
                <br/>
                <button type="submit" class="btn btn-sm btn-flat bg-green btn_min_width">
                    Add &nbsp;  &nbsp; <i class="fa fa-plus-circle"></i>
                </button>

                {{ Form::close() }}
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@endsection
