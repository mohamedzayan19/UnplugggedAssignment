<!-- resources/views/projects/edit.blade.php -->
<?php $user = Auth::user();?>
@extends('master')

@section('body')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
    
    {{ Form::open(array('action' => ['ProjectsController@update', $project],'method' => 'PUT'))  }}
        {!! csrf_field() !!}
        {{ method_field('PUT') }}


        <!-- Task Name -->
        <div class="form-group">

            <label for="task-name" class="col-sm-4 control-label">Project name</label>

            <div class="col-sm-6">
                <input type="text" name="title" id="task-name" class="form-control" value="{{$project->title}}">
            </div>
       <label for="task-name" class="col-sm-4 control-label">Description</label>

            <div class="col-sm-6">
                <input type="text" name="description" id="task-name" class="form-control" value="{{$project->description}}" >
            </div>

        </div> 

       <div class="form-group">

            
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Edit Project
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <!-- TODO: Current Tasks -->
@endsection