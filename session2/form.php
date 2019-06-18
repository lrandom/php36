<?php
if (isset($_POST['submit'])) {
    $colors = $_POST['colors'];
    foreach ($colors as $r) {
        switch ($r) {
            case "1":
                echo "orange";
                break;
            case "2":
                echo "Brown";
                break;
            case "3":
                echo "red";
                break;
        }
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
    <form method="POST">
        <label>Orange</label>
        <input type="checkbox" value="1" name="colors[]" />

        <label>Brown</label>
        <input type="checkbox" value="2" name="colors[]" />

        <label>Red</label>
        <input type="checkbox" value="3" name="colors[]" />

        <input type="submit" name="submit" value="submit" />
    </form>
</body>

</html>