<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    var username = '';
    var last_id = 0;

    function loadMsg() {
        $.ajax({
            type: "get",
            url: "server?last_id=" + last_id,
            dataType: "json",
            success: function(response) {
                for (let index = 0; index < response.length; index++) {
                    $('.msg-content').append(`<li>
                    <span class="username">${response[index].name}</span>
                    <span class="content">${response[index].content}</span>
                </li>`);
                    last_id = response[response.length - 1].id;
                    console.log(last_id);
                }
            }
        });
    }

    $(document).ready(function() {
        $('.btn-enter').click(function() {
            username = $('#username').val();
            console.log(username);
            if (username == '') {
                alert("Pls enter your username");
            } else {
                $('.chat-box').show();
                $('.enter-box').hide();
                setInterval(() => {
                    loadMsg()
                }, 1000);
            }
        })

        $('.btn-send').click(function() {
            var msg = $('#msg').val();
            if (msg != null && msg != '') {
                //gui request len server thong qua ajax
                $.ajax({
                    type: "post",
                    url: "server.php",
                    data: {
                        'username': username,
                        'content': msg
                    },
                    dataType: "json",
                    success: function(response) {
                        //         if (response.success == 1) {
                        //             $('.msg-content').append(`<li>
                        //     <span class="username">${username}</span>
                        //     <span class="content">${msg}</span>
                        // </li>`);
                        //         }
                    }
                });
            }
        })
    });
    </script>
</head>

<body>
    <div>
        <div class="enter-box">
            <input type="text" id="username" />
            <button class="btn-enter">ENTER</button>
        </div>

        <div class="chat-box">
            <ul class="msg-content">
                <li>
                    <span class="username">Luan</span>
                    <span class="content">Bala blo</span>
                </li>
            </ul>

            <div>
                <input type="text" id="msg" />
                <button class="btn-send">SEND</button>
            </div>
        </div>
    </div>

    <style>
    .msg-content li {
        list-style: none;
    }

    .msg-content {
        margin: 0px;
        padding: 0px;
        padding: 5px;
        height: 200px;
        overflow-y: scroll;
        border: 1px solid #cdcdcd;
    }

    .chat-box {
        display: none
    }
    </style>
</body>

</html>