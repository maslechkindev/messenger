@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat with admin</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="panel panel-default chat-panel-block">
                                <div class="panel-body">
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
