<?php $support = $ticket_reply->support()->get()->first() ?>
<div class="box-body chat">
    <div class="item col-sm-offset-1">
        <hr>
        <img src="{{asset('/bower_components/AdminLTE/dist/img/default-avatar.jpg')}}" class="img-circle"
             alt="User Image">

        <p class="message">
            <a href="{{route('users.show',[$support->id])}}" class="name">
                {{$support->fullName()}}
            </a>
            {{$ticket_reply->reply}}
        </p>
    </div>
</div>