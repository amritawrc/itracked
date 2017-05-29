<?php

require_once('db.conf.php');
$group1 = (isset($_POST['group1'])) ? $_POST['group1'] : '';
$student1 = (isset($_POST['student1'])) ? $_POST['student1'] : '';

$group2 = (isset($_POST['group2'])) ? $_POST['group2'] : '';
$student2 = (isset($_POST['student2'])) ? $_POST['student2'] : '';

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';

$res = $res1 = mysqli_query($con, "select id from tbl_ins_stu_map  where ins_id=$instructor_id and stu_id in ($student1,$student2) and status=1");
$mnr = mysqli_num_rows($res1);

//while ($row1 = mysqli_fetch_assoc($res)) {
    $res1 = mysqli_query($con, "Update tbl_ins_stu_map set stu_id='$student1' where stu_id = '" . $student2 . "' and grp_id = '" . $group2 . "' and ins_id = '" . $instructor_id . "' and status=1");
    $res2 = mysqli_query($con, "Update tbl_ins_stu_map set stu_id='$student2' where stu_id = '" . $student1 . "' and grp_id = '" . $group1 . "' and ins_id = '" . $instructor_id . "' and status=1");
    
    $res3 = mysqli_query($con, "Update tbl_grp_stu_map set stu_id='$student1' where stu_id = '" . $student2 . "' and grp_id = '" . $group2 . "' and status=1");
    $res4 = mysqli_query($con, "Update tbl_grp_stu_map set stu_id='$student2' where stu_id = '" . $student1 . "' and grp_id = '" . $group1 . "' and status=1");
//}

if ($res1) {
    $a['code'] = "100";
    $a['msg'] = "Swaping done successfully ";
    $a['instructor_id'] = $instructor_id;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Swaping not send";
    echo json_encode($a);
}
