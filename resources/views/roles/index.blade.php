@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role Management</h1>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Displaying all items
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover dt-responsive"
                        id="dataTables-example">
                        <thead>
                            <th>Role Id</th>
                            <th>Role Name</th>
                            @if(Auth::user()->can('role-edit') || Auth::user()->can('role-delete')) 
                                <th>Action</th>
                            @endif
                        </thead>
                        @foreach($roles as $key => $role) 
                            <tr>
                                <td>
                                    {{ $role->id }}
                                </td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    @can('role-edit')
                                        <a href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-link']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>                        
                            </tr>
                        @endforeach    
                    </table>                
                </div>
                <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
</div>
@endsection