<div class="col-md-11 @if ($message->id_sender != $id_user)  navbar-right @endif">
    <div class="panel panel-default
        @if ($message->id_sender != $id_user)
            message-body-admin
            @if ($message->is_new == 1)
                message-body-new
            @endif
        @else
            message-body-user
        @endif
            ">
        <div class="panel-body">
            @if(empty($id_user_to)) <span class="message-delete">x</span> @endif
                {{$message->message}}
        </div>
    </div>
</div>