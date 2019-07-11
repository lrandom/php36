<?php
session_start();
include_once('users.php');
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $user = new Users();
    $user->getConnect();
    $exist_user = $user->getUser($username, md5(md5(md5($pwd))));
    if ($exist_user != null) {
        $_SESSION['user'] = $exist_user;
        header('Location:profile.php');
    } else {
        echo 'No user in our db';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="pwd" />
        </div>

        <input type="submit" value="submit" />
    </form>
</body>

</html>