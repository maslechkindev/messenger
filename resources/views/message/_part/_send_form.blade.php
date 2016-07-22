<form class="form-horizontal" id="send-message-form" role="form" method="POST">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-12">
            <input id="message" type="textarea" class="form-control" name="message">
            <input id="id_sender" type="hidden" class="form-control" name="id_sender" value="{{ $id_user }}">
            <input id="id_user_to" type="hidden" class="form-control" name="id_user_to" value="{{ $id_user_to }}">
            <input id="id_last_message" type="hidden" class="form-control" name="id_last_message" value="{{ $id_last_message }}">
            @if ($errors->has('message'))
                <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <button type="button" class="btn btn-primary send-form-button">
                <i class="fa fa-btn fa-user"></i> Send
            </button>
        </div>
    </div>
</form>