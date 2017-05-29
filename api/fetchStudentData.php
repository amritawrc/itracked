<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

//$profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/itracked/assets/upload/student_image/';
$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_image/';

$res = $res1 = mysqli_query($con, "select * from tbl_student where stu_seq_no = '" . $student_id . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);
$row['path'] = $profile_upload_to;
$row['image'] = $profile_upload_to.$row['profile_picture'];

$res1 = mysqli_query($con, "select tbl_event.* from tbl_event inner join tbl_ins_stu_map on tbl_ins_stu_map.ev_id=tbl_event.ev_seq_no  where tbl_ins_stu_map.stu_id=$student_id");
$mnr1 = mysqli_num_rows($res1);
$row1 = mysqli_fetch_assoc($res1);
$row['event'] = $row1;

$res2 = mysqli_query($con, "select tbl_instructor.* from tbl_instructor inner join tbl_ins_stu_map on tbl_ins_stu_map.ins_id=tbl_instructor.ins_seq_no  where tbl_ins_stu_map.stu_id=$student_id");
$mnr2 = mysqli_num_rows($res2);
$row2 = mysqli_fetch_assoc($res2);
$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/instructor_image/';
$row2['path'] = $profile_upload_to;
$row2['image'] = $profile_upload_to.$row2['profile_picture'];
$row['instructor'] = $row2;


if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Student data successfully fetched";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Unable to fetch student data";
    echo json_encode($a);
}
?>
