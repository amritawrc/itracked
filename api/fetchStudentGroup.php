<?php

require_once('db.conf.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$res = mysqli_query($con, "select g.*,s.ins_id,s.stu_id,i.first_name as instructor_first_name,i.last_name as instructor_last_name from tbl_group as g left join tbl_ins_stu_map as s on g.group_seq_no=s.grp_id inner join tbl_instructor as i on i.ins_seq_no=s.ins_id where s.stu_id=$student_id");

$mnr = mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);

$res1 = mysqli_query($con, "SELECT * FROM `tbl_grp_stu_map` WHERE grp_id='" . $row['group_seq_no'] . "' ");

$row3 = array();
while ($row1 = mysqli_fetch_assoc($res1)) {

    if ($row1['stu_id'] != $student_id) {
        $res1 = mysqli_query($con, "SELECT * FROM `tbl_student` WHERE stu_seq_no='" . $row1['stu_id'] . "' ");
        $row3 = array();
        while ($row2 = mysqli_fetch_assoc($res1)) {
            $row3[] = $row2;
        }
        $row['student'] = $row3;
    }
}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Student group fetched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Student group not fetched ";
    echo json_encode($a);
}