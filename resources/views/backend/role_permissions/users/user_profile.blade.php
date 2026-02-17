@extends('layouts.backend')

{{--@section('title', '| Users')--}}

@section('content')
    <section class="content">
        <div class="row actions_row btn_breadcumbs">
            <div class="col-md-12">
                <a class="btn btn-sm btn-flat bg-orange" href="{{route('dashboard')}}">
                    <i class="fa fa-backward"></i> Dashboard
                </a>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.partials.form-errors')
                @include('backend.partials.post-success')


                <br>
                <h4><i class='fa fa-user'></i> Edit Profile</h4>
                <br>

                {{-- Form model binding to automatically populate our fields with user data --}}
                {{ Form::model($user, ['route' => ['user.profile.update']]) }}
                {{Form::hidden('id', $user->id)}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['required' => true, 'some-param' => 'itsValue', 'class' => 'form-control']) }}
                        </div>

                        <input type="hidden" value="{{$user->password}}" name="password" id="password">
                        <input type="hidden" value="not_changed" name="password_changed" id="password_changed">
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            <button class="btn btn-sm btn-flat bg-teal btn_change_password" style="padding-top: 0.2em; padding-bottom: 0.2em;">
                                Change Password <i class="fa fa-question-circle-o"></i>
                            </button>
                            <input type="password" class="form-control" name="new_password" id="new_password" value="........" disabled>

                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{--                                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}--}}
                            <input type="password" value="........" class="form-control" name="new_password_confirmation" id="password_confirmation" disabled>


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
