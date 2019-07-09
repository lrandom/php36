<?php
$conn = mysqli_connect("localhost", "root", "koodinh", "demo_session_8");
if (!$conn) {
    die("Connect to server error " . mysqli_error($conn));
}

echo "Connect successfully !!!";

$sql = 'insert into users(`name`,`id_city`) values("Nguyen Thanh Luan",1)';

if (mysqli_query($conn, $sql)) {
    echo 'Insert success';
    echo 'Id ' . mysqli_insert_id($conn);
} else {
    echo 'Insert failed' . mysqli_error($conn);
};

$sql = 'select * from users';
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["id"];
            echo $row["name"];
            echo $row["id_city"];
        }
    }
}

$mnt = mysqli_prepare($conn, 'insert into users(`name`,`id_city`) values(?,?)');
mysqli_stmt_bind_param($mnt, 'si', $a, $b);
$a = 'Luan Thanh';
$b = 2;
mysqli_execute($mnt);