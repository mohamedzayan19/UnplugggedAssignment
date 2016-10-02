@extends('master')
@section('title')
    {{$project->description}}
@endsection
@section('header')
    {{$project->title}}
@endsection

@section('body')

    <h1>{{$project->title}}</h1>
        <!-- chat item -->
        @if(Auth::user()->isAdministrator())

            {{ Form::open(array('route' => array('projects.edit', $project->id), 'method' => 'GET')) }}

            {{ Form::submit('Edit project') }}

            {{ Form::close() }}
            {{ Form::open(array('route' => array('projects.destroy', $project->id), 'method' => 'DELETE')) }}
            {{ method_field('DELETE') }}
            {{ Form::submit('Delete project') }}

            {{ Form::close() }}
        @endif
@endsection