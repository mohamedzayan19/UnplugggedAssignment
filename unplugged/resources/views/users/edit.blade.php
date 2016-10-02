

@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
   {{ Form::open(array('action' => ['UsersController@update', $user],'method' => 'PUT'))  }}
        {!! csrf_field() !!}
        {{ method_field('PUT') }}


        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-4 control-label">Name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>

        <label for="task-name" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" >
            </div>

       <div class="form-group">
            <label for="status" class="col-sm-5 control-label">Role</label>

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
                    <i class="fa fa-plus"></i> Update user
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection