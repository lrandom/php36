<?php
include_once('connect.php');
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            //xoa 
            $id = $_GET['id'];
            $id = mysqli_escape_string($conn, $id);
            if (is_numeric($id)) {
                mysqli_query($conn, 'DELETE FROM `users` WHERE `id` = ' . $id);
            }
            break;

        case 'edit':
            //update
            $id = $_GET['id'];
            header('Location: edit.php?id=' . $id);
            break;

        default:
            # code...
            break;
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
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>City Name</td>
            <td>Thao tac</td>
        </tr>


        <?php
        $sql = 'SELECT *,`users`.`id` as id,
        `cities`.`name` as cities_name 
        FROM `users` 
        INNER JOIN `cities` ON `users`.`id_city`=`cities`.`id`';
        //echo $sql;
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['cities_name'] . '</td>';
                echo '<td>
                   <a href="?action=delete&id=' . $row['id'] . '">Xoa</a>
                   <a href="?action=edit&id=' . $row['id'] . '">Sua</a>
                </td>';
                echo '</tr>';
            }
        }
        ?>

    </table>
</body>

</html>