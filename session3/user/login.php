<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'admin') {
        //neu match 
        //tao fake data
        $user = array(
            'id' => 1,
            'username' => $username,
            'address' => 'Ha Long, Quang Ninh',
            'phone' => '0868121289'
        );
        $_SESSION['user'] = $user;

        if ($_POST['remember_me'] == 1) {
            setcookie('username', $username, time() + 3600 * 24);
            setcookie('password', $password, time() + 3600 * 24);
        } else {
            if (isset($_COOKIE['username'])) {
                setcookie('username', '', time() - 3600 * 24);
                setcookie('password', '', time() - 3600 * 24);
            }
        };
        header('Location: profile.php');
    } else {
        //khong match
        $error = 'username and password incorrect !!!';
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
<style>
.wrapper {
    width: 500px;
    margin: 0px auto;
}

.wrapper form>div {
    margin-top: 20px;
}

.wrapper form label {
    width: 100px;
    display: inline-block;
}
</style>

<body>
    <div class="wrapper">
        <form method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="username"
                    value="<?php echo (isset($_COOKIE['username'])) ? $_COOKIE['username'] : '' ?>" />
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password"
                    value="<?php echo (isset($_COOKIE['password'])) ? $_COOKIE['password'] : '' ?>" />
            </div>

            <div>
                <input type="checkbox" name="remember_me" value="1" <?php if (isset($_COOKIE['username'])) {
                                                                        echo 'checked';
                                                                    } ?> />
                Remember Me
            </div>

            <div>
                <input type="submit" value="Login" />
            </div>
        </form>
    </div>
</body>

</html>