<?php
if (isset($_GET['logout'])) {
    //xu li logout
    header('Location: see_again.php');
    exit();
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
    <?php
    if (isset($_GET['username'])) {
        ?>
    Xin chao <?php echo $_GET['username']; ?>
    <a href="?logout">Logout</a>
    <?php
} else {
    header('Location: index.php');
}
?>
</body>

</html>