
<?php $user = Auth::user();?>
@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
   {{ Form::open(array('action' => ['ProjectsController@store'],'method' => 'POST'))  }}
        {!! csrf_field() !!}



        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-4 control-label">Project name</label>

            <div class="col-sm-6">
                <input type="text" name="title" id="task-name" class="form-control">
            </div>

        <label for="task-name" class="col-sm-4 control-label">Description</label>

            <div class="col-sm-6">
                <input type="text" name="description" id="task-name" class="form-control" >
            </div>

       

            <div class="col-sm-6">
                <input type="hidden" name="user_id" id="task-name" class="form-control" value="{{$user->id}}">
            </div>

 
        </div> 

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Create project
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection