<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=demophp36_1', 'root', 'koodinh');
    $rs = $conn->query('SELECT * FROM users');
    $conn->query('SELECT * FROM users');
    foreach ($rs as $r) {
        //echo $r['id'];
        // echo $r['name'];
    }
    echo '<br>';

    //$row = $conn->exec('INSERT INTO `users`(`name`,`phone`,`address`) VALUES ("289374","98789789798798","uiyuiy")');
    //echo $row . 'affected';

    $prp = $conn->prepare('INSERT INTO `users`(`name`,`phone`,`address`) VALUES (?,?,?)');
    $prp->bindParam(1, $name);
    $prp->bindParam(2, $phone);
    $prp->bindParam(3, $address);

    $name = "Luan";
    $phone = "1928192";
    $address = "Ha Long";

    $prp->execute();
    $prp->execute(array("Luan", "18927192", "Ha Long"));

    $prp2 = $conn->prepare('INSERT INTO `users`(`name`,`phone`,`address`) VALUES (:name,:phone,:address)');
    $prp2->bindParam(':name', $name);
    $prp2->bindParam(':phone', $phone);
    $prp2->bindParam(':address', $address);

    $name = "Luan";
    $phone = "1928192";
    $address = "Ha Long";

    $prp2->execute();
    $prp2->execute(array(":name" => "Luan", ":phone" => "9089", ":address" => "skdfdkj"));

    $prp3 = $conn->prepare('SELECT * FROM users WHERE id =?');
    $prp3->execute(array(1));
    while ($row = $prp3->fetch(PDO::FETCH_ASSOC)) {
        echo $row['id'] . $row['name'] . '<br>';
    }

    while ($row = $prp3->fetch(PDO::FETCH_OBJ)) {
        echo $row->id;
        echo $row->name;
        echo '<br>';
    }
} catch (Exception $e) {
    echo $e->getMessage();
}