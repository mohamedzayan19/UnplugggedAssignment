<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In</title>
    <!-- Tell the browser to be responsive to screen width -->
    @include('partials.css')
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            LogIn
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        @include('partials.flash')

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->

                <!-- Chat box -->
                <div class="box box-success">
                    <br/>
                    <br/>

                    <div>
                        {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'url' =>
                        ['auth/login']])!!}
                        <div class="form-group">

                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-3">
                                <input type="email" class="form-control input-md" name="email" value="{{old('email')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-3">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Sign In
                                </button>
                                 <a href="/redirect">FB Login</a>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                   
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                </div>
                <!-- /.box (chat box) -->

                <!-- quick email widget -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
        </div>

           {{ Form::open(array('action' => ['UsersController@store'],'method' => 'POST'))  }}
        {!! csrf_field() !!}



        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-4 control-label">Name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="name" class="form-control">
            </div>

        <label for="task-name" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" >
            </div>

        <label for="task-name" class="col-sm-4 control-label">Password</label>

            <div class="col-sm-6">
                <input type="password" name="password" id="password" class="form-control">
            </div>

 
        </div> 
       <div class="form-group">

         <input type="hidden" name="role" id="role" class="form-control" value="Normal">
        </div>
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Register
                </button>
            </div>
        </div>
        {{ Form::close() }}
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
@include('partials.js')
</body>
</html>
