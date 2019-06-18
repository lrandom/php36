<?php
if (isset($_POST['username'])) {
    $correct_username = 'admin';
    $correct_password = 'admin';
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Nếu username và password đúng
    if (
        $username == $correct_username
        && $password == $correct_password
    ) {
        header('Location: profile.php?username=' . $username);
    } else {
        $message = "Your login info incorrect !!!";
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
    <div>
        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" />
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" />
            </div>

            <?php if (isset($message)) {
                echo $message;
            } ?>
            <div>
                <input type="submit" name="login" value="Login" />
            </div>
        </form>
    </div>
</body>

</html>