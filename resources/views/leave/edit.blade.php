@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Update leave details</h2>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="row" style="padding-left:15px; padding-right:15px;">       
            <div class="alert alert-success col-lg-12" id="alert">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            {{ Form::model($leave, array('route' => array('leave.update', $leave->id), 'method' => 'PUT')) }}
                <div class="panel panel-default">
                    <div class="panel-heading"><font size="3">Leave details</font></div>
                    <div class="panel-body">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label>Reason</label>
                                </div>
                                <div class="col-lg-6">
                                    {{ Form::text('reason', null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <br />
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Start date</label>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::date('start_date', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-2">
                                <label>End date</label>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::date('end_date', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="submit" class="btn pull-right" value="Submit" id="approve">
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