<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'CHMS') }}</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        @if(count($notifications) > 0 )
            <li class="dropdown" id="notifications_menu">
                <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell fa-fw" style="color:red;"></i>
                    <span class="badge badge-warning" id="notifications_count">{{count($notifications)}} </span>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    {{ Form::model($notifications, array('route' => array('update_notifications'), 'method' => 'PUT')) }}
                        @foreach($notifications as $notification)
                            <input type="hidden" value="{{$notification->id}}" name="notification[{{ $notification->id }}]">
                            <input type="hidden" value="{{url()->current()}}" name="current_url">
                            <li class="notification active" style="margin-left:5px; margin-right:3px; margin-top:10px;">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="media-object">
                                        <img src="{{$notification->avatar}}" class="img-circle" alt="Avatar" style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                            {{$notification->message}}
                                        <div class="notification-meta" style="margin-right:15px;">
                                            <small class="timestamp pull-right"><i>
                                                @if((\Carbon\Carbon::parse($notification->date)
                                                ->diffInDays(\Carbon\Carbon::parse($date))) == 0)
                                                    Today
                                                @elseif((\Carbon\Carbon::parse($notification->date)
                                                ->diffInDays(\Carbon\Carbon::parse($date))) == 1 )
                                                    Yesterday
                                                @elseif((\Carbon\Carbon::parse($notification->date)
                                                ->diffInDays(\Carbon\Carbon::parse($date))) == 2 )
                                                    Three days ago
                                                @elseif((\Carbon\Carbon::parse($notification->date)
                                                ->diffInDays(\Carbon\Carbon::parse($date))) > 2 )
                                                    More than three days ago
                                                @endif
                                            </i></small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                        @endforeach
                        <li>
                            <div align="center">
                                {{ Form::submit('Mark all as read', array('class' => 'btn btn-info')) }}                                        
                            </div>
                        </li>
                    {{ Form::close() }}
                </ul>
            </li>
        @endif                                 
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">                        
                <i class="fa fa-user fa-fw"></i>   
                {{ Auth::user()->name }}                     
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{ url('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <div class="input-group custom-search-form">
                </div>
                <!-- /input-group -->
                </li>
                @if(Auth::user()->can('leave-request') || Auth::user()->can('leave-approve'))                     
                    <li>                            
                        <a href="#">
                            <i class="fas fa-plus-circle"></i> Leaves
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">     
                            @can('leave-request')                           
                                <li>    
                                    <a href="{{ url('leave/request') }}">Request leave</a>
                                </li>
                            @endcan                               
                            @can('leave-approve')
                                <li>
                                    <a href="{{ url('leave/approve') }}">Approve leave request</a>
                                </li>
                            @endcan
                            <li>
                                <a href="{{ url('leave/requests') }}">My leave requests</a>
                            </li>
                        </ul>                           
                    </li>
                @endif
                @if(Auth::user()->can('role-create') || Auth::user()->can('role-list'))
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fas fa-key"></i> Roles
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            @can('role-create')
                                <li>
                                    <a href="{{ url('roles/create') }}">Create Role</a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li>
                                    <a href="{{ url('roles') }}">All Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->can('user-create') || Auth::user()->can('user-list'))
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fas fa-users"></i> Users
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            @can('user-create')
                                <li>
                                    <a href="{{ url('users/create') }}">Create User</a>
                                </li>
                            @endcan
                            @can('user-list')
                                <li>
                                    <a href="{{ url('users') }}">All Users</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>