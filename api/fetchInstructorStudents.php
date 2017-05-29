<?php

require_once('db.conf.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';
$type = (isset($_POST['type'])) ? $_POST['type'] : ''; //1 = instructor  , 2= parent
$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_image/';

if ($type == '1') {
    $res = $res1 = mysqli_query($con, "select distinct stu_id from tbl_ins_stu_map  where ins_id=$instructor_id");

    $mnr = mysqli_num_rows($res1);

    $row = array();
    while ($row1 = mysqli_fetch_assoc($res)) {
        $res1 = mysqli_query($con, "SELECT s.*,map.lat,map.long FROM `tbl_student` as s inner join tbl_ins_stu_map as map on s.stu_seq_no=map.stu_id WHERE s.stu_seq_no='" . $row1['stu_id'] . "' ");
//            $row3=array();
        $row2 = mysqli_fetch_assoc($res1);
//            while ($row2 = mysqli_fetch_assoc($res1)) {
//                   $row3[]=$row2;
//                }
        $row2['path'] = $profile_upload_to;
        $row2['image'] = $profile_upload_to . $row2['profile_picture'];
        if (count($row2) > 0) {
            $row1['student'] = $row2;
        } else {
            $row1['student'] = '';
        }
        $row[] = $row1;
    }
} else {
    $res = $res1 = mysqli_query($con, "select distinct child_id from tbl_par_stu_map  where par_id=$instructor_id");

    $mnr = mysqli_num_rows($res1);

    $row = array();
    while ($row1 = mysqli_fetch_assoc($res)) {
        $res1 = mysqli_query($con, "SELECT s.*,map.lat,map.long FROM `tbl_student` as s inner join tbl_par_stu_map as map on s.stu_seq_no=map.child_id WHERE s.stu_seq_no='" . $row1['child_id'] . "' ");
//            $row3=array();
        $row2 = mysqli_fetch_assoc($res1);
//            while ($row2 = mysqli_fetch_assoc($res1)) {
//                   $row3[]=$row2;
//                }
        $row2['path'] = $profile_upload_to;
        $row2['image'] = $profile_upload_to . $row2['profile_picture'];
        if (count($row2) > 0) {
            $row1['student'] = $row2;
        } else {
            $row1['student'] = '';
        }
        $row[] = $row1;
    }
}



if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Instructor groups fetched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Instructor groups not fetched ";
    echo json_encode($a);
}