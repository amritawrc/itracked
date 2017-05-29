<?php

require_once('db.conf.php');

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';

//$profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/itracked/assets/upload/instructor_image/';
$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/instructor_image/';

$res = $res1 = mysqli_query($con, "select * from tbl_instructor where ins_seq_no = '" . $instructor_id . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);
$row['path'] = $profile_upload_to;
$row['image'] = $profile_upload_to.$row['profile_picture'];

$res1 = mysqli_query($con, "select tbl_event.*,tbl_instructor.first_name,tbl_instructor.last_name from tbl_event inner join tbl_instructor on tbl_instructor.current_event_id=tbl_event.ev_seq_no  where tbl_instructor.ins_seq_no=$instructor_id");
$mnr1 = mysqli_num_rows($res1);
$row1 = mysqli_fetch_assoc($res1);
if($mnr1){
$row['event'] = $row1;
}


if ($mnr > 0) {
    $a['code']   = "100";
    $a['msg']    = "Instructor data successfully fetched";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code']   = "300";
    $a['msg']    = "Unable to fetch instructor data";
    echo json_encode($a);
}
?>
