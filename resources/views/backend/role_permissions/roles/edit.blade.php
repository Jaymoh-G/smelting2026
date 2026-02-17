@extends('layouts.backend')


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
            <div class="col-md-12">
                @include('backend.partials.form-errors')

                <br>
                <h4><i class='fa fa-key'></i> Edit Role</h4>
                <br>

{{--                {{print_r($role->users)}}--}}

                {{-- Form model binding to automatically populate our fields with role data --}}
                {{ Form::model($role, ['route' => ['roles.update']]) }}
                {{Form::hidden('id', $role->id)}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
{{--                            {{ Form::text('name', $role->name, ['required' => true, 'disabled' => 'true', 'class' => 'form-control']) }}--}}
                            <input type="text" value="{{$role->name}}" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'description') }}
                            {{ Form::text('description', null, ['some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5><b>Permissions</b></h5>
                        <div class='form-group'>
                            @foreach ($permissions as $permission)
                               <label style="margin-right: 1.6em; cursor: pointer">
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                    @if(in_array($permission->name, ($role->permissions()->pluck('name'))->toArray())) checked @endif
                                    >
                                    {{ucfirst($permission->name)}}
                                </label>

                            @endforeach
                        </div>
                    </div>
                </div>

                {{--                    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}--}}
                <button type="submit" class="btn btn-sm btn-flat bg-green btn_min_width">
                    Update &nbsp;  &nbsp; <i class="fa fa-cloud-upload"></i>
                </button>

                {{ Form::close() }}
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.btn_change_password', function(e){
                e.preventDefault();
                $('#password_confirmation, #new_password').prop('disabled', false).val("");
                $('#password_changed').val('changed');
            });
        });
    </script>

@endpush
