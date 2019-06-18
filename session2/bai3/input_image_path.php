<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post" action="index.php">
        <?php
        if (isset($_POST['image_number'])) {
            $number_image = $_POST['image_number'];
            for ($i = 0; $i < $number_image; $i++) {
                ?>
        <input type="text" name="image_path_<?php echo $i; ?>" placeholder="Image <?php echo $i + 1; ?>" />
        </br>
        <?php
        }
    }
    ?>
        <!-- <button value="<?php 
                            ?>" name="submit">Next</button> -->
        <input type="hidden" name="image_number" value="<?php echo $number_image ?>" />
        <input type="submit" value="Next" name="submit" />
    </form>
</body>

</html>