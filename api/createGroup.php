<?php

require_once('db.conf.php');

$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';
$group_name = (isset($_POST['group_name'])) ? $_POST['group_name'] : '';
$created_date = time();
$status = 1;

$res0 = mysqli_query($con, "Insert into `tbl_group` (`org_id`,`group_name`, `group_owner`, `ins_id`,`created_date`,`status`) "
        ."values('$org_id','$group_name','$instructor_id','$instructor_id','$created_date','$status'");
$user_mli = mysqli_insert_id($con);
//echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//exit;

if ($res0) {
    $a['code'] = "100";
    $a['group_id'] = $user_mli;
    $a['msg'] = "Group added successfully";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Something went wrong";
    echo json_encode($a);
}
?>