<?php
session_start();
include_once('users.php');
$user = $_SESSION['user'];
if (isset($_POST['phone']) && isset($_POST['pwd'])) {
    $phone = $_POST['phone'];
    $pwd = $_POST['pwd'];
    $userObj = new Users();
    $userObj->getConnect();
    $userObj->updateUser($user['id'], $phone, md5(md5(md5($pwd))));
    $userObj->disconnect();
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
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>" />
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="pwd" />
        </div>

        <input type="submit" value="submit" />
    </form>
</body>

</html>