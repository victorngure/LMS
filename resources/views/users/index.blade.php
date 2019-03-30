@extends('layouts.master')
@section('content')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User Management</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
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
              <table width="100%" class="table table-striped table-bordered table-hover dt-responsive"
                  id="dataTables-example">
                  <thead>
                      <th>Staff Number</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th width="25%">Roles</th>
                      @if(Auth::user()->can('user-edit') || Auth::user()->can('user-delete'))
                        <th>Action</th>
                      @endif
                  </thead>
                  @foreach ($users as $key => $user)
                  <tr>
                    <td>{{ $user->staff_number }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                      @endif
                    </td>
                    <td>
                      @can('user-edit')
                        <a href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                      @endcan
                      @can('user-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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