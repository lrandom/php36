<?php
function div($a, $b)
{
    if ($b == 0) {
        throw new Exception("the param two must be differ 0", 1);
    }

    if ($b < 50) {
        throw new Exception("The param two must be larger 50", 2);
    }

    return $a / $b;
}

//div(10, 0);

try {
    div(10, 10);
    try {
        throw new Exception("ABC");
    } catch (Exception $e) { }
} catch (Exception $e) {
    switch ($e->getCode()) {
        case 1:
            echo "Param two is equal 0";
            break;

        case 2:
            echo "Param two is smaller than 50";
            break;
    }
} finally {
    echo 'Success';
}