@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit user details</h2>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="panel panel-default">
                <div class="panel-heading"><font size="3">Update user details</div></font>
                <div class="panel-body">  
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Staff Number : </label>
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('staff_number', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>E-Mail : </label>
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>           
                    <br />
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Role(s)</label>
                        </div>
                        <div class="col-lg-6">
                            {!! Form::select('roles[]', $roles, $userRole, array('class' => 'roles','multiple')) !!}
                        </div>
                    </div> 
                    <br />
                    <div class="row">
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-success btn pull-right">{{ __('Update') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection