<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$lat = (isset($_POST['lat'])) ? $_POST['lat'] : '';
$long = (isset($_POST['long'])) ? $_POST['long'] : '';

$api = 'blogmo.com/itracked/api/'.$student_id.'/'.$lat.'/'.$long;

$res2 = mysqli_query($con, "Insert into `tbl_api` (`api`) "
                . "values('$api')");

$res0 = mysqli_query($con, "update `tbl_ins_stu_map` set `lat` = '" . $lat . "',`long` = '" . $long . "' WHERE `stu_id` = '" . $student_id . "' AND `status`= 1 ");
//$user_mli = mysqli_insert_id($con);

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

