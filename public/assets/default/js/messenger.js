var chat =  new Chat();

$(document).ready(function(){
    $('.send-form-button').click(function(){
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