<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .slider {
        position: relative;
        margin: 0px;
        padding: 0px;
    }

    .slider li {
        position: absolute;
        list-style: none
    }

    .slider li img {
        width: 300px;
        height: 150px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <button class="btn-prev">prev</button>
        <button class="btn-next">next</button>
    </div>
    <ul class="slider">
        <?php
        $path = array();
        if (isset($_POST['submit'])) {
            $number_image = $_POST['image_number'];
            for ($i = 0; $i < $number_image; $i++) {
                $path[] = $_POST['image_path_' . $i];
            }
        }
        ?>
        <?php
        for ($i = 0; $i < count($path); $i++) {
            ?>
        <li>
            <img src="<?php echo $path[$i] ?>" />
        </li>
        <?php
    }
    ?>
    </ul>
</body>

<script>
$(document).ready(function() {
    var count = $('.slider li').length - 1;
    $('.btn-next').click(function() {
        if (count > 0) {
            $('.slider li').eq(count).hide();
            count--;
        }
    })

    $('.btn-prev').click(function() {
        if (count < ($('.slider li').length - 1)) {
            count++;
            $('.slider li').eq(count).show();
        }
    })
});
</script>

</html>