<?php
session_start();
if (isset($_POST['address'])) {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    //validate va cap nhap vao csdl

    $user = $_SESSION['user'];
    $user['address'] = $address;
    $user['phone'] = $phone;
    $_SESSION['user'] = $user;

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
    <form method="POST">
        <div>
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $user['address']; ?>" />
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>" />
        </div>

        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
    <?php
    } else {
        header('Location: login.php');
    }
    ?>
</body>

</html>