<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$res = $res1 = mysqli_query($con, "select tbl_instructor.*,tbl_ins_stu_map.ins_id,tbl_ins_stu_map.stu_id from tbl_instructor inner join tbl_ins_stu_map on tbl_ins_stu_map.ins_id=tbl_instructor.ins_seq_no  where tbl_ins_stu_map.stu_id=$student_id");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "User Instructor feched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "No User Instructor present";
    echo json_encode($a);
}
?>
