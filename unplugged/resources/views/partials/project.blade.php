<?php $user = $project->user()->get()->first() ?>
 <ul class="treeview-menu">
                        <li><p>{{$project->title}} ::  belongs to: {{$user->name}}</p></li>
                        @if((Auth::user()->isAdministrator())||(Auth::user()==$user))
                         <a href="{{route('projects.edit',[$project])}}">edit</a>
                                    {{ Form::open(array('route' => array('projects.destroy', $project->id), 'method' => 'DELETE')) }}
                                    {{ method_field('DELETE') }}
                                    {{ Form::submit('Delete project') }}
                                    {{ Form::close() }}
                                    @endif

 </ul>

