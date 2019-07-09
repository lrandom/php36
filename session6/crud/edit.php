<?php
include_once('connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $sql = 'SELECT * 
    FROM users 
    WHERE id =' . mysqli_real_escape_string($conn, $_GET['id']);
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    mysqli_query($conn, 'UPDATE `users` SET `name` = "' . $name . '" WHERE `id`=' . $id);
    header('Location: edit.php?id=' . $id);
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
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <div>
            <label></label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" />
        </div>

        <input type="submit" value="Submit" />
    </form>
</body>

</html>