<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$res = $res1 = mysqli_query($con, "select emergency_contact_name,emergency_contact_primary_no,emergency_contact_secondary_no,emergency_contact_tertiary_no from tbl_student where stu_seq_no = '" . $student_id . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Student emergency successfully fetched";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Unable to fetch student data";
    echo json_encode($a);
}
?>