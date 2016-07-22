function Chat () {
    this.update = updateChat;
    this.getMessage = getMessage;
    this.sendMessage = sendMessage;
    this.scrollChat = scrollChat;
    this.clearField = clearField;
}

function getMessage() {

}

//Updates the chat
function updateChat() {
    var form = $('#send-message-form');
    $.ajax({
        type: "POST",
        url: '/updatechat',
        data: form.serialize(),
        success: function(response){
            messageBlock = '';
            messages = JSON.parse(response);
            id_sender = $('#id_sender').val();
            for(i = 0; i<messages.length; ++i){
                messageBlock += createMessageBlock(messages[i], id_sender);
            }
            $('#chat-panel-body').append(messageBlock);
            clearField("message");
            scrollChat("chat-panel-body");
        }
    });
    return false;
}


function createMessageBlock(message, id_sender) {
    msgs = '';
    clMainBl = message.id_sender != id_sender ? 'navbar-right' : '';
    clMainBlPanel = message.id_sender != id_sender ? 'message-body-admin' : 'message-body-user';
    clMainBlPanelNewMsg = message.id_sender != id_sender && message.is_new == 1 ? 'message-body-new' : '';

    msgs += '<div class="col-md-11 ' + clMainBl + '" >';
    msgs +=     '<div class="panel panel-default ' + clMainBlPanel + ' ' + clMainBlPanelNewMsg + '" >';
    msgs +=         '<div class="panel-body"> ' + message.message + '</div>';
    msgs +=     '</div>';
    msgs += '</div>';
    return msgs;
}

function sendMessage(url){
    var form = $('#send-message-form');
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(response){
            updateChat();
        }
    });
    return false;
}

function scrollChat(scrollBlockId){
    var element = document.getElementById(scrollBlockId);
    element.scrollTop = element.scrollHeight;
}

function clearField(field){
    var element = document.getElementById(field);
    element.value = "";
}