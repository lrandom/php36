<?php
$conn = mysqli_connect("localhost", "root", "koodinh", 'curd');
if (!$conn) {
    die("Connect to mysql errror,Try again");
};

//perform an insert query
mysqli_query($conn, 'insert into posts(`name`,`content`) VALUES("Luan","HAHAHA")') or die(mysqli_error($conn));
$id = mysqli_insert_id($conn);
echo $id;

$result = mysqli_query($conn, 'SELECT * FROM posts');
while ($row = mysqli_fetch_assoc($result)) {
    echo $row["id"] . $row["name"] . $row["content"];
}

$stmn = mysqli_prepare($conn, "insert into values (?,?,?)");
mysqli_bind_param($stmn, 'ssi', $fb_id, $abc, $db);
$fb_id = '1';
mysqli_stmt_execute($stmn);