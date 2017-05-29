<?php

require_once('db.conf.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$group_id = (isset($_POST['group_id'])) ? $_POST['group_id'] : '';

$res = mysqli_query($con, "select distinct stu_id,grp_id from  tbl_grp_stu_map where grp_id=$group_id");
$mnr = mysqli_num_rows($res);

$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_image/';

$row = array();
while ($row1 = mysqli_fetch_assoc($res)) {

    $res1 = mysqli_query($con, "SELECT tbl_student.*,map.lat,map.long FROM `tbl_student` inner join tbl_ins_stu_map as map on map.stu_id=tbl_student.stu_seq_no WHERE tbl_student.stu_seq_no='" . $row1['stu_id'] . "' ");
//            $row3=array();
    $mnr1 = mysqli_num_rows($res1);
    $row2 = mysqli_fetch_assoc($res1);
    if ($mnr1) {
        $row2['path'] = $profile_upload_to;
        $row2['image'] = $profile_upload_to . $row2['profile_picture'];
    }

//            while ($row2 = mysqli_fetch_assoc($res1)) {
//                   $row3[]=$row2;
//                }
    if (count($row2) > 0) {
        $row1['student'] = $row2;
    } else {
        $row1['student'] = '';
    }
    $row[] = $row1;
}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Group student fetched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Group student not fetched ";
    echo json_encode($a);
}