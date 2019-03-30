@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">My leave request(s)</h2>
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
                                    <th>Request date</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Reject reason</th>
                                    <th>Edit</th>
                                </thead>  
                                @foreach($leaves as $leave) 
                                        <tr class="custom_centered">
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
                                                @if($leave->status == null)
                                                    Pending
                                                @else
                                                    {{ $leave->status }}
                                                @endif
                                            </td> 
                                            <td>
                                                @if($leave->reject_reason == null)
                                                    N/A
                                                @else
                                                    {{ $leave->reject_reason }}
                                                @endif
                                            </td>
                                            <td align="center">
                                                @if($leave->status == 'Request for more details')
                                                    <a href="{{ url('leave/'.$leave->id.'/edit') }}"><i class="fas fa-pen"></i></a>
                                                @endif
                                            </td>                          
                                        </tr>
                                @endforeach                                    
                            </table>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection