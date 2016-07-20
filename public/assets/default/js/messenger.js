$(document).ready(function(){
    $('.send-form-button').click(function(){
        sendMessage();
    })
    $(document).keypress(function(e) {
        if(e.which == 13) {
            sendMessage();
            return false;
        }
    });
});

function sendMessage(){
    var form = $('#send-message-form');
    $.ajax({
        type: "POST",
        url: '/send',
        data: form.serialize(),
        success: function(response){

        }
    });
    return false;
}

/********************************************************/
// kick off chat
//var chat =  new Chat();

// $(function() {
//     chat.getMessage();
//     // watch textarea for key presses
//     // watch textarea for release of key press
//     $('#message').keyup(function(e) {
//         if (e.keyCode == 13) {
//             var text = $(this).val();
//             var maxLength = $(this).attr("maxlength");
//             var length = text.length;
//             // send
//             if (length <= maxLength + 1) {
//                 chat.send(text, name);
//                 $(this).val("");
//             } else {
//                 $(this).val(text.substring(0, maxLength));
//             }
//         }
//     });
// });
