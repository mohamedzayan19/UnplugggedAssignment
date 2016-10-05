@extends('master')

@section('body')
<?php $users = \App\User::all() ?>


            <h3 class="box-title">Search results</h3>
                <ul class="treeview-menu">

                    @foreach($results as $result)
                        <li><p>{{$result['title']}}</p></li>
                     @endforeach   
                </ul>
@endsection
    <!-- chat item -->
    <!-- /.chat -->

