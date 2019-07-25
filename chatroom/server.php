<?php
header('Content-type:application/json');
$conn = mysqli_connect('localhost', 'root', 'koodinh', 'chatroom')
    or die("Loi roi ba con oi");
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $content = $_POST['content'];
    mysqli_query($conn, 'INSERT 
    INTO `msg`(`name`,`content`) 
    VALUES("' . $username . '","' . $content . '")');
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
}

if (isset($_GET['last_id'])) {
    $last_id = $_GET['last_id'];
    if ($last_id == 0) {
        $query = 'SELECT * 
        from `msg` ORDER BY `id` DESC LIMIT 0,5';
        $rs = mysqli_query($conn, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        $tmp = array_reverse($data);
        echo json_encode($tmp);
    } else {
        $query = 'SELECT * 
        from `msg` WHERE `id` > ' . $last_id;
        $rs = mysqli_query($conn, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}