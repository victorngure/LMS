@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    @if ($errors->any())
        <div class="alert alert-danger col-lg-8">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit role</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="panel panel-default">
                <div class="panel-heading"><font size="3">Update role details</div></font>
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-lg-2">
                            {{ Form::label('name', 'Role Name : ') }}
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('name', null, array('placeholder' => 'Please provide a name for the role','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-2">                  
                            {!! Form::label('permissions', 'Permissions') !!}
                        </div>
                        <div class="col-lg-6">
                            <select id="permissions" name="permission[]" multiple="multiple">
                                @foreach($permission as $value)
                                    <option {{ in_array($value->id, $rolePermissions) ? 'selected':''}} value="{{ $value->name }}">
                                        {{$value->name}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">  
                            {{ Form::submit('Submit', array('class' => 'btn btn-success btn pull-right')) }} 
                        </div>
                    </div>
                    <br />
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection