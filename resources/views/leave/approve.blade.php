@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Approve leave request(s)</h2>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="row" style="padding-left:15px; padding-right:15px;">       
            <div class="alert alert-success col-lg-12" id="alert">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Displaying all items
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    {{ Form::model($leaves, array('route' => array('update.leave.approval'), 'method' => 'PUT')) }}
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <th>Staff Number</th>
                                    <th>Request date</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Reason</th>
                                    <th>Approve</th>
                                    <th>Reject</th> 
                                    <th>Request for more details</th>                       
                                </thead>  
                                @foreach($leaves as $leave) 
                                        <tr class="custom_centered">
                                            <td>
                                            <input type="hidden" name="{{'staff_number['.$leave->id.']'}}" value="{{$leave->staff_number}}">
                                                {{ $leave->staff_number }}
                                            </td>
                                            <td>
                                                {{ $leave->request_date }}
                                            </td>
                                            <td>
                                                {{ $leave->start_date }}
                                            </td>
                                            <td>
                                                {{ $leave->end_date }}
                                            </td>
                                            <td>
                                                {{ $leave->reason }}
                                            </td>
                                            <td>
                                                <input type="radio" name="{{'approve_reject['.$leave->id.']'}}" value="approve" class="approve_toggle">
                                            </td>
                                            <td>
                                                <input type="radio" name="{{'approve_reject['.$leave->id.']'}}" value="reject" data-toggle="modal" data-target="#rejectModal{{$leave->id}}" class="approve_toggle">
                                            </td>
                                            <td>
                                                <input type="radio" name="{{'approve_reject['.$leave->id.']'}}" value="details" class="approve_toggle">
                                            </td>                               
                                        </tr>
                                        <div class="modal fade" id="rejectModal{{$leave->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal-title" align="center">Reject leave request</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-2"> 
                                                                {{ Form::label(null, 'Reason') }}
                                                            </div>
                                                            <div class="form-group col-lg-10"> 
                                                                {{ Form::text('reject_reason['.$leave->id.']', null, array('class' => 'form-control datepicker', 'placeholder' => 'Please provide a reason for rejecting the leave request')) }}
                                                            </div>                                                        
                                                        </div>                                         
                                                        <div class="modal-footer" style="padding-right:0px">
                                                            <button type="button" class="btn btn-primary btn pull-right"
                                                                data-dismiss="modal">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach                                    
                            </table>
                        </div>
                        {{ Form::submit('Submit', array('class' => 'btn btn-success btn pull-right approve_button')) }} 
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection