@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add a new user</h2>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="panel panel-default">
                <div class="panel-heading"><font size="3">Create user</div></font>
                <div class="panel-body">  
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Name : </label>
                        </div>
                        <div class="col-lg-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            {{-- @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Staff Number : </label>
                        </div>
                        <div class="col-lg-6">
                            <input id="staff_number" type="text" class="form-control{{ $errors->has('staff_number') ? ' is-invalid' : '' }}" name="staff_number" value="{{ old('staff_number') }}" required autofocus>
                            {{-- @if ($errors->has('staff_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('staff_number') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>E-Mail : </label>
                        </div>
                        <div class="col-lg-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            {{-- @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Password : </label>
                        </div>
                        <div class="col-lg-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            {{-- @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Confirm Password : </label>
                        </div>
                        <div class="col-lg-6">
                            <input id="password-confirm" type="password" class="form-control" name="confirm-password" required>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Role : </label>
                        </div>
                        <div class="col-lg-6">
                            {!! Form::select('roles[]', $roles,[], array('class' => 'roles','multiple')) !!}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn pull-right">Register</button>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection