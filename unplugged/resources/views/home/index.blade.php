@extends('master')

@section('body')
<?php $users = \App\User::all() ?>
    <div class="box-header">
        <i class="fa fa-comments-o"></i>

        <h3 class="box-title">Projects</h3>

    </div>
    <h3>My projects</h3>
        @include('partials.projects.index',['projects' => $myProjects, 'id' => 'myProjects'])
        <h3>All projects</h3>
        @include('partials.projects.index',['projects' => $allProjects, 'id' => 'allProjects'])
            <h3 class="box-title">All users</h3>
                <ul class="treeview-menu">

                    @foreach($users as $user)
                        <li><p>{{$user->name}}</p></li>
                        @if(Auth::user()->isAdministrator())
                        <a href="{{route('users.edit',[$user->id])}}">edit</a>
                                 {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'DELETE')) }}
                                    {{ method_field('DELETE') }}
                                    {{ Form::submit('Delete user') }}
                                    {{ Form::close() }}
                        @endif            

                    @endforeach
                </ul>
@endsection
    <!-- chat item -->
    <!-- /.chat -->

