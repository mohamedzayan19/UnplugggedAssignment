<?php $projects = \App\Project::all() ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/bower_components/AdminLTE/dist/img/default-avatar.jpg')}}" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->fullName()}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{ Form::open(array('action' => ['SearchController@search'],'method' => 'POST','class'=>'sidebar-form'))  }}
            {!! csrf_field() !!}
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
         {{ Form::close() }}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-angle-down"></i> <span>Projects</span>
                </a>
                <ul class="treeview-menu">
                    
                        <li><a href="{{route('projects.create')}}"><i class="fa fa-plus"></i><span>Create Project</span></a>
                        </li>
                    
                    @foreach($projects as $project)
                        <li><a href="{{route('projects.show',[$project->id])}}">{{$project->name}}</a></li>
                    @endforeach
                </ul>
            </li>
           
            @if(Auth::user()->isAdministrator())
                <li><a href="{{action("UsersController@create")}}"><i class="fa fa-user-plus"></i> <span>Add new User</span></a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
