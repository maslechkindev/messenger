<div class="col-md-12 @if($user->deleted == 1) user-deleted @endif">
    <span class="@if($user->deleted == 1) user-update @else user-delete @endif" data-user-to="{{$user->id}}"
          onclick="@if($user->deleted == 1) userUpdate(this); @else userDelete(this); @endif">
        @if($user->deleted == 1) u @else x @endif
    </span>
    <a class="user-link" href="/" onclick='checkUser(this); return false;' data-user-to="{{$user->id}}">{{$user->name}}</a>
    <span class="user-count-messages" data-user-to="{{$user->id}}">@if($user->message_count > 0)({{$user->message_count}})@endif</span>
</div>