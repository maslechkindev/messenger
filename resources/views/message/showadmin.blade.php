@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body users-block-body">
                        <div class="col-md-12 user-all @if($id_user_to == null) user-active @endif">
                            <a class="user-link" href="/" onclick='checkUser(this); return false;'>For all users</a>
                        </div>
                        @if(!empty($users))
                            @foreach($users as $user)
                                @include('message._part._user')
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat with admin</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="panel panel-default chat-panel-block">
                                <div class="panel-body chat-panel-body" id="chat-panel-body" >
                                    @foreach ($messages as $message)
                                        @include('message._part._message')
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @include('message._part._send_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
