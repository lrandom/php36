<?php
session_start();
if (isset($_GET['logout'])) {
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        header('Location: login.php');
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
    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        ?>
    <div>
        <span>Username:</span><span><?php echo $user['username']; ?></span>
        <br>
        <span>Address:</span><span><?php echo $user['address']; ?></span>
        <br>
        <span>Phone:</span><span><?php echo $user['phone']; ?></span>
    </div>

    <a href="?logout">Logout</a>
    <a href="update_profile.php">Update Profile</a>
    <?php
} else {
    header('Location: login.php');
}
?>
</body>

</html>