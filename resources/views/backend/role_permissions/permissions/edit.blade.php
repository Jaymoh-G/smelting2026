@extends('layouts.backend')


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
                <h4><i class='fa fa-key'></i> Edit Permission</h4>
                <br>

                {{-- Form model binding to automatically populate our fields with permission data --}}
                {{ Form::model($permission, ['route' => ['permissions.update']]) }}
                {{Form::hidden('id', $permission->id)}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'description') }}
                            {{ Form::textarea('description', null, ['rows' => '5', 'class' => 'form-control']) }}

                        </div>
                    </div>

                    <div class="col-md-6">

                    </div>
                </div>

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
