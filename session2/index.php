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
    $index = 0;
    while ($index < 10) {
        ?>
    <p>Hello <?php echo $index; ?></p>
    <?php
        $index++;
    }
    ?>

    <?php echo '</br>'; ?>
    <?php
    $index = 0;
    do {
        ?>
    <p>Hello <?php echo $index; ?></p>
    <?php
        $index++;
    } while ($index < 10);
    ?>

    </br>
    <?php
    for ($i = 0; $i < 10; $i++) {
        if ($i == 7) {
            continue;
        }
        echo '<p>Hello' . $i . '</p>';
    }
    ?>

    <?php
    $cars = array("Toyota", "Bmw", "Volvo");
    var_dump($cars);
    echo $cars[1];
    echo '</br>';

    $trucks[0] = "Carterpilar";
    $trucks[1] = "HD";
    $trucks[2] = "Komatsu";
    var_dump($trucks);
    echo '</br>';

    $motors[] = "Ducati";
    $motors[] = "Kawasaki";
    var_dump($motors);
    echo $motors[0];
    echo '</br>';

    //Duyet mang 
    // for ($i = 0; $i < count($motors); $i++) {
    //     echo $motors[$i];
    // }

    // $cars = array();
    // $cars = array(
    //     'key1' => 'Toyota',
    //     'key2' => 'Volvo',
    //     'key3' => 'BMW'
    // );
    // echo $cars['key1'];

    // $trucks = array();
    // $trucks['key0'] = 'Caterpillar';
    // $trucks['key1'] = 'HD';

    // foreach ($trucks as $key => $value) {
    //     echo $key . ':' . $value;
    //     echo '</br>';
    // }

    // for ($i = 0; $i < count($trucks); $i++) {
    //     echo $trucks["key" . $i];
    // }

    $mang = array(
        array('A', 'B', 'C', 'D'),
        array('E', 'F', 'G', 'H'),
        array('E', 'J', 'Q', 'K')
    );

    for ($i = 0; $i < count($mang); $i++) {
        for ($j = 0; $j < count($mang[$i]); $j++) {
            echo $mang[$i][$j];
        }
    }

    $mang2 = array(
        'A' => array('a' => 'A', 'b' => 'B', 'c' => 'C'),
        'B' => array('d' => 'D', 'e' => 'E', 'f' => 'F')
    );

    foreach ($mang2 as $key => $value) {
        foreach ($mang2[$key] as $k => $v) {
            echo $k . ':' . $v;
        }
    }

    $mang3 = array(
        'A' => array(
            'a' => array('A', 'B', 'C'),
            'b' => array('D', 'E', 'F')
        ),
        'B' => array(
            'd' => array('C', 'D', 'E'),
            'e' => array('F', 'G', 'H')
        )
    );

    foreach ($mang3 as $key => $value) {
        foreach ($mang3[$key] as $k => $v) {
            foreach ($mang3[$key][$k] as $r) {
                echo $r;
            }
        }
    }


    $mang4 = array(3, 4, 5, 1, 2, 3);
    //sap xep tu nho den lon cho indexed array
    sort($mang4);
    var_dump($mang4);

    //sap xep tu lon den nho cho indexed array
    rsort($mang4);
    var_dump($mang4);


    $mang5 = array('A' => 'Haha', 'D' => 'Hihi', 'C' => 'AAA');
    //sap xep tu nho den lon cho assoc array (theo value);
    asort($mang5);
    var_dump($mang5);

    //sap xep tu nho den lon cho assoc array (theo key);
    ksort($mang5);
    var_dump($mang5);

    //tu lon den nho
    //arsort();
    //krsort();

    //explode
    //implode

    $chuoi = 'a,b,c,d,e,f';
    $mangmoi = explode(',', $chuoi);
    var_dump($mangmoi);
    $chuoi2 = implode('', $mangmoi);
    echo $chuoi2;

    array_push($mangmoi, 'd');

    $GLOBALS['a'] = '10';
    ?>
</body>

</html>