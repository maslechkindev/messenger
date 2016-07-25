function Chat () {
    this.update = updateChat;
    this.getMessage = getMessage;
    this.sendMessage = sendMessage;
    this.scrollChat = scrollChat;
    this.clearField = clearField;
    this.getUserMessages = getUserMessages;
    this.deleteUser = deleteUser;
    this.updateUser = updateUser;
    this.getUsers = getUsers;
}

function getMessage() {

}

var defaultUserBlock = '<div class="col-md-12 user-all user-active"><a class="user-link" onclick="checkUser(this); return false;" href="/">For all users</a></div>';

//Updates the chat
function updateChat() {
    var form = $('#send-message-form');
    $.ajax({
        type: "POST",
        url: '/updatechat',
        data: form.serialize(),
        success: function(response){
            console.log(response);
            messageBlock = '';
            messages = JSON.parse(response);
            id_sender = $('#id_sender').val();
            id_user_to = null;
            for(i = 0; i<messages.length; ++i){
                if(messages[i].id_user_to != id_sender && id_user_to == null){
                    id_user_to = messages[i].id_user_to;
                }
                if(messages[i].id_sender != id_sender && id_user_to == null){
                    id_user_to = messages[i].id_sender;
                }
                messageBlock += createMessageBlock(messages[i], id_sender);
            }

            $('#id_user_to').val(id_user_to);
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
    actionDelMsg = message.id_sender != id_sender && message.is_new == 1 ? 'message-body-new' : '';
    clMainBlPanelNewMsg = message.id_user_to.length == 0 ? '<span class="message-delete">x</span>' : '';

    msgs += '<div class="col-md-11 ' + clMainBl + '" >';
    msgs +=     '<div class="panel panel-default ' + clMainBlPanel + ' ' + clMainBlPanelNewMsg + '" >';
    msgs +=         '<div class="panel-body"> ' + message.message;
    msgs +=             actionDelMsg;
    msgs +=         '</div>';
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

function getUserMessages(userto){
    var form = $('#send-message-form');
    $('#chat-panel-body').html('');
    $.ajax({
        type: "POST",
        url: '/showajax',
        data: '&id_user_to='+userto,
        success: function(response){
            messageBlock = '';
            messages = response.messages;
            id_sender = $('#id_sender').val();
            id_user_to = null;
            for(i = 0; i<messages.length; ++i){
                if(messages[i].id_user_to != id_sender && id_user_to == null){
                    id_user_to = messages[i].id_user_to;
                }
                if(messages[i].id_sender != id_sender && id_user_to == null){
                    id_user_to = messages[i].id_sender;
                }
                messageBlock += createMessageBlock(messages[i], id_sender);
            }

            $('#id_user_to').val(id_user_to);
            $('#chat-panel-body').append(messageBlock);
            clearField("message");
            scrollChat("chat-panel-body");
        }
    });
    return false;
}

function  deleteUser(userto){
    $.ajax({
        type: "POST",
        url: '/userdelete',
        data: '&id_user_to='+userto,
    });
    return false;
}

function  updateUser(userto){
    $.ajax({
        type: "POST",
        url: '/userupdate',
        data: '&id_user_to='+userto,
    });
    return false;
}


function getUsers(){
    $.ajax({
        type: "POST",
        url: '/usersshow',
        success: function(response){
            usersBlock = defaultUserBlock;
            for(i = 0; i<response.length; ++i){
                usersBlock += createUserBlock(response[i]);
            }
            $('.users-block-body').html(usersBlock);
        }

     });
    return false;
}

function createUserBlock(user){
    usrs = '';
    clMainBl = user.deleted == 1 ? 'user-deleted' : '';
    clActionBl = user.deleted == 1 ? 'user-update' : 'user-delete';
    actionBl = user.deleted == 1 ? 'u' : 'x';
    actionJsBl = user.deleted == 1 ? "userUpdate(this)" : "userDelete(this)";
    actionJsUsBl = "checkUser(this); return false;";
    countMessages = user.message_count > 0 ? '('+user.message_count+')' : '';

    usrs += '<div class="col-md-12 ' + clMainBl + '" >';
    usrs +=     '<span class="' + clActionBl + '" data-user-to="'+user.id+'" onclick="'+actionJsBl+'">'+actionBl+'</span>';
    usrs +=     '<a class="user-link" href="/" onclick="'+actionJsUsBl+'" data-user-to="' + user.id + '">'+user.name+'</a>';
    usrs +=     '<span class="user-count-messages" data-user-to="'+user.id+'">'+countMessages+'</span>';
    usrs += '</div>';
    return usrs;
}