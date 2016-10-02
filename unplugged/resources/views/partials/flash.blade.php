<div class="container" style="text-align: center; position: relative;">
    @if (isset($message))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{$message}}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{(session('message'))}}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('warning')}}
        </div>

    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger" style="height: 90%">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>