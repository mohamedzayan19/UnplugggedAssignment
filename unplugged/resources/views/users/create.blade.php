
<?php $user = Auth::user();?>
@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
   {{ Form::open(array('action' => ['UsersController@store'],'method' => 'POST'))  }}
        {!! csrf_field() !!}



        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-4 control-label">name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control">
            </div>

        <label for="task-name" class="col-sm-4 control-label">email</label>

            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" >
            </div>

        <label for="task-name" class="col-sm-4 control-label">password</label>

            <div class="col-sm-6">
                <input type="text" name="password" id="password" class="form-control">
            </div>

 
        </div> 
       <div class="form-group">
            <label for="status" class="col-sm-5 control-label">Status</label>

            <div class="col-sm-5">
                <select name="role" class="form-control">
                    <option name="role" id="role">Normal</option>
                    <option name="role" id="role">Administrator</option>
                </select>
            </div>
        </div>
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Create user
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection