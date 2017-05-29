<?php

require_once('db.conf.php');

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$type = (isset($_POST['type'])) ? $_POST['type'] : '';

if ($type == 'parent') {
    $res = mysqli_query($con, "select email from tbl_parent where 1 and email = '" . $email . "'");
    $mnr = mysqli_num_rows($res);
    $return = 'false';
    if ($mnr > 0) {
        echo $return;
    } else {
        $return = 'true';
        echo $return;
    }
} else {
    $res = mysqli_query($con, "select email from tbl_student where 1 and email = '" . $email . "'");
    $mnr = mysqli_num_rows($res);
    $return = 'false';
    if ($mnr > 0) {
        echo $return;
    } else {
        $return = 'true';
        echo $return;
    }
}
