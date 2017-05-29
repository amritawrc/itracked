<?php

require_once('db.conf.php');

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';
$lat = (isset($_POST['lat'])) ? $_POST['lat'] : '';
$long = (isset($_POST['long'])) ? $_POST['long'] : '';

$res0 = mysqli_query($con, "update `tbl_instructor` set `lat` = '" . $lat . "',`long` = '" . $long . "' WHERE `ins_seq_no` = '" . $instructor_id . "' AND `status`= 1 ");
$user_mli = mysqli_insert_id($con);

if ($res0) {
    $a['code'] = "100";
    $a['msg'] = "Location updated successfully ";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Location not updated  ";
    echo json_encode($a);
}
?>