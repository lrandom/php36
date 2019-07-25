<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('div').click(function() {
            console.log("click div");
            $.ajax({
                type: "get",
                url: "server.php?id=1",
                dataType: "json",
                success: function(response) {
                    //khi server tra ve status 200( thanh cong)
                    console.log(response.content);
                    $('p').append('<div>' + response.content + '</div>');
                },
                done: function() {
                    //bat ke luc nao
                },
                error: function() {
                    //khi server tra ve status 500,501,blabla( thanh cong)
                }
            });

        })
    });
    </script>
    <style>
    div {
        border: 1px solid red;
    }
    </style>
</head>

<body>
    <p></p>
    <div>Load Content</div>
</body>

</html>