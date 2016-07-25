var chat =  new Chat();

$(document).ready(function(){
    $('.send-form-button').on('click', function(){
        chat.sendMessage('/send');
    })
    $(document).keypress(function(e) {
        if(e.which == 13) {
            chat.sendMessage('/send');
            return false;
        }
    });
    chat.scrollChat("chat-panel-body");
    
});

function userDelete(user){
    chat.deleteUser($(user).data('user-to'));
    chat.getUsers();
    return false;
}

function userUpdate(user){
    chat.updateUser($(user).data('user-to'));
    chat.getUsers();
    return false;
}

function checkUser(user){
        chat.getUserMessages($(user).data('user-to'));
        $('.user-link').parent().removeClass('user-active');
        $(user).parent().addClass('user-active');
        return false;
}

function userClearHistory(user){
     //chat.userClearHistory($(user).data('user-to'));
    $.ajax({
        type: "POST",
        url: '/historydelete',
        data: '&id_user_to='+$(user).data('user-to'),
    });
    // $('.user-link').parent().removeClass('user-active');
    // $(user).parent().addClass('user-active');
}



