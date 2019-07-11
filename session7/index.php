<?php
class Transporter
{
    public $color = 'Red';
    private $wheel_number = 4;
    protected $material = 'inox';

    public function __construct($color)
    {
        //parent::__construct();
        //Do your magic here
        $this->color = $color;
    }



    public function getWheel()
    {
        $num_args = func_num_args();
        $arr = func_get_args();

        switch ($num_args) {
            case 0:
                echo "abc";
                break;

            case 1:
                echo $arr[0] . $arr[1];
                break;
        }
    }




    public function getMeterial()
    {
        echo $this->material;
    }
}

class Car extends Transporter
{
    public function getColor()
    {
        echo $color;
    }

    public function getWheel()
    {
        echo $this->wheel_number;
    }
}

$obj = new Transporter("BLue");
$obj->color;
$obj->getWheel(1, 2);
$obj->wheel_number;
$obj->material;

echo '</br>';
$car = new Car();
$car->getColor();
$car->getWheel();