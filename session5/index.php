<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<style>
.btn-add,
input[type="submit"] {
    width: 100px !important;
    background: #fff;
    border: 1px solid #cdcdcd;
    text-align: center;
    padding: 10px;
    display: block;
    margin-top: 10px
}
</style>
<script>
$(document).ready(function() {
    var count = 0;
    $('.btn-add').click(function() {
        $('form .wrapper-files').append('<div><input type="file" name="file_' + count +
            '" ></input></div>');
        count++;
        $('input[name="count"]').val(count);
    })
});
</script>

<body>
    <form method="POST" action="handle_images.php" enctype="mutilpart/form-data">
        <div class="wrapper-files">
        </div>
        <div class="btn-add">+</div>
        <input type="hidden" name="count" value="0" />
        <input type="submit" value="Submit" />
    </form>
</body>

</html>