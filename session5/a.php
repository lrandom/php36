<?php
if (isset($_FILES['image'])) {
    $flag = true;
    //jpg | jpeg | png;
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    echo $ext;
    if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
        echo 'We not allow upload differen file without image';
        $flag = false;
    }

    //must be < 10 mb;
    if ($_FILES['image']['size'] > 10 * 1024 * 1024) {
        echo 'The file size must be less than 10 mb';
        $flag = false;
    }

    if ($flag == false) {
        echo 'Have an error ! try again';
    } else {
        $dir_path = 'uploads/' . date('Y') . '_' . date('M');
        //echo $dir_path;
        if (
            !file_exists($dir_path) || is_file($dir_path)
        ) {
            mkdir($dir_path, 0777);
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $dir_path . '/' . time() . '.' . $ext);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit" value="Submit" />
    </form>
</body>

</html>