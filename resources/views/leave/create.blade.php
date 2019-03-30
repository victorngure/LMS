@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Request leave</h2>
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
            {{ Form::model(null, array('route' => array('leave.store'), 'method' => 'POST')) }}
                <div class="panel panel-default">
                    <div class="panel-heading"><font size="3">Leave details</font></div>
                    <div class="panel-body">
                        <div class="row">
                                <div class="col-lg-2">
                                    <label>Reason</label>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" name="reason" type="text" placeholder="Please provide a reason for request" required autofocus>
                                </div>
                            </div>
                            <br />
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Start date</label>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control datepickerMin" name="start_date" placeholder="MM/DD/YYY"
                                    type="date" required>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-2">
                                <label>End date</label>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control datepickerMin" name="end_date" placeholder="MM/DD/YYY"
                                    type="date" required>
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