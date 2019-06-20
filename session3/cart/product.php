<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $price = $_GET['price'];
    if (isset($_SESSION['cart'])) {
        //session cart da ton tai;
        $cart = $_SESSION['cart'];
        $flagFound = false;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                //tang so luong san pham len
                $cart[$i]['quantity'] = $cart[$i]['quantity'] + 1;
                $_SESSION['cart'] = $cart;
                $flagFound = true;
                break;
            }
        }

        //neu nhu ko tim thay san pham trong gio hang
        if ($flagFound == false) {
            array_push($cart, array(
                'id' => $id,
                'title' => $title,
                'price' => $price,
                'quantity' => 1
            ));
            $_SESSION['cart'] = $cart;
        }
    } else {
        //session cart chua ton tai;
        $_SESSION['cart'] = array(
            array(
                'id' => $id,
                'title' => $title,
                'price' => $price,
                'quantity' => 1
            )
        );
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
li {
    list-style: none;
}
</style>
<?php
$products = array(
    array(
        'id' => 1,
        'title' => 'Laptop Dell',
        'content' => 'Lorem ipsum dolor sit amen',
        'price' => 100
    ),
    array(
        'id' => 2,
        'title' => 'Laptop Asus',
        'content' => 'Lorem ipsum dolor sit amen',
        'price' => 120
    ),
    array(
        'id' => 3,
        'title' => 'Laptop Hp',
        'content' => 'Lorem ipsum dolor sit amen',
        'price' => 150
    ),
    array(
        'id' => 4,
        'title' => 'Laptop AlienWare',
        'content' => 'Lorem ipsum dolor sit amen',
        'price' => 180
    ),
    array(
        'id' => 5,
        'title' => 'Dien thoai Vinsmart',
        'content' => 'Lorem ipsum dolor sit amen',
        'price' => 200
    ),
)
?>

<body>
    <ul>
        <?php
        foreach ($products as $key => $value) {
            ?>
        <li>
            <img src="https://via.placeholder.com/150C/O" />
            <h4><?php echo $value['title']; ?></h4>
            <p>
                <?php echo $value['content']; ?>
            </p>
            <small><?php echo $value['price']; ?> usd</small>
            <button><a
                    href="
                                                                                                                                                                    ?id=<?php echo $value['id'] ?>&title=<?php echo $value['title'] ?>&price=<?php echo $value['price'] ?>">Add
                    to cart</a></button>
        </li>
        <?php
    }
    ?>
    </ul>
</body>

</html>