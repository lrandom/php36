<?php
session_start();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'remove':
            //xoa sp khoi gio hang
            if (isset($_SESSION['cart'])) {
                $id = $_GET['id'];
                $cart = $_SESSION['cart'];
                for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$i]['id'] == $id) {
                        //xoa phan tu khoi mang
                        array_splice($cart, $i, 1);
                        $_SESSION['cart'] = $cart;
                        break;
                    }
                }
            }
            break;

        case 'plus':
            //tang don vi san pham len
            break;

        case 'minus':
            //giam don vi san pham xuong
            break;

        case 'clear':
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
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
    <h2>Your cart</h2>
    <a href="?action=clear">Xoa toan bo san pham trong gio hang</a>
    <?php
    // var_dump($_SESSION['cart']);
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        foreach ($cart as $key => $value) {

            ?>
    <div>
        <img src="https://via.placeholder.com/150C/O" />
        <h4><?php echo $value['title']; ?></h4>
        <p><span>Quantity: <?php echo $value['quantity']; ?> x <?php echo $value['price']; ?> USD</span></p>
        <button><a href="?id=<?php echo $value['id'];  ?>&action=remove">Remove</a></button>
        <button><a href="?id=<?php echo $value['id']; ?>&action=plus">+</a></button>
        <button><a href="?id=<?php echo $value['id']; ?>&action=minus">-</a></button>
    </div>

    <?php
    } //end for
} //end if
?>
</body>

</html>