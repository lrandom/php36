<?php
if (isset($_POST['count'])) {
    $count = $_POST['count'];
    //echo $count;
    //exit();
    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            if (isset($_FILES['file_' + i])) {
                //upload code here   
            }
        }
    }
}